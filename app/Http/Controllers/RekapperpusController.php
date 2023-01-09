<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rekapperpus;
use App\Models\DaftarAnggota;
use Illuminate\Http\Request;

class RekapperpusController extends Controller
{
    public function history(){
        $data = Rekapperpus::get();
        return view('history.history',compact('data'));
    }
     public function scanner(){
        
        return view('history.tambahhistory');
    }
    public function scannerpost(Request $request){
       
        $now = now();
        $sekarang = $now->format('H');
        $history = Rekapperpus::where('nisn',$request->nisn)->whereDate('created_at',carbon::now())->first();
        if(is_null($history)){
            $siswa = DaftarAnggota::where('nisn',$request->nisn)->first();
            if(is_null($siswa)){
                return redirect()->back()->with("errors","");
                // dd('errors');
            } else {
               $data = Rekapperpus::create([
                'nisn' => $siswa->nisn,
                'nama' => $siswa->nama,
                'jeniskelamin' => $siswa->jenis_kelamin,
                'kelas' => $siswa->kelas,
            ]); 
            // dd('berhasil');
            return redirect()->back()->with("berhasil","");
            }
            
        } else {
            return redirect()->back()->with("gagal","");
            // dd('gagal');
        }
        
    }
}

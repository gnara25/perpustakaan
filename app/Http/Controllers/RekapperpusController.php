<?php

namespace App\Http\Controllers;

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
       
        // dd($jam);
        $siswa = DaftarAnggota::where('nisn',$request->nisn)->first();
           $data = Rekapperpus::create([
            'nisn' => $siswa->nisn,
            'nama' => $siswa->nama,
            'jeniskelamin' => $siswa->jenis_kelamin,
            'kelas' => $siswa->kelas,
        ]);

        return redirect()->back()->with("success","Data Berhasil Di Rekap");
    }
}

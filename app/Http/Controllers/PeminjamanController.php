<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\DaftarAnggota;
use App\Models\Daftarbuku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function peminjaman(){
        $data = Peminjaman::all();
        $namasiswa = DaftarAnggota::all();
        $namabuku = Daftarbuku::all();
        return view('peminjaman.peminjaman', compact('data','namasiswa','namabuku'));
    }

    public function table(){
        $data = Peminjaman::with('buku',);
        return view('peminjaman.peminjaman', compact('data'));
    }

    public function tambahpeminjaman(){
        $data = DaftarAnggota::all();
        $buku = Daftarbuku::all();
        return view('peminjaman.tambahpeminjaman', compact('data','buku'));
    }

    public function insert(Request $request){
     
        // dd($databuku);

        
        $databuku =  Daftarbuku::findOrFail($request->namabuku);
        if ($databuku->jumlah >= $request->jumlah) {
            $data = Peminjaman::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'namabuku' => $request->namabuku,
            'tanggalpinjam' => $request->tanggalpinjam,
            'tanggalpengembalian' => $request->tanggalpengembalian,
            'jumlah' => $request->jumlah,
        ]);
            $databuku->jumlah -= $request->jumlah;
            $databuku->save();
        }else  {
            return redirect()->back()->with('error','Jumlah Buku Kurang');
        }
        
        
        return redirect()->route('peminjaman')->with('success', 'Data Berhasil ditambahkan');
    }

    public function editpeminjaman($id){

        $data = Peminjaman::findOrFail($id);
        // dd($data);
        $namasiswa = DaftarAnggota::all();
        $namabuku = Daftarbuku::all();
        return view('peminjaman.editpeminjaman',compact('data','namasiswa','namabuku'));
    }

    public function editpeminjamanpost(request $request, $id){
        $data = Peminjaman::find($id);
        $data->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'namabuku' => $request->namabuku,
            'tanggalpinjam' => $request->tanggalpinjam,
            'tanggalpengembalian' => $request->tanggalpengembalian,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('peminjaman')->with('success', 'Data berhasil di edit');
    }

    public function deletepeminjaman($id){
        $data = Peminjaman::find($id);
        $data->delete();
        return redirect()->route('peminjaman')->with('success', 'Data berhasil di hapus');
    }
}

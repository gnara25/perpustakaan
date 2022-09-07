<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function peminjaman(){
        $data = Peminjaman::all();
        return view('peminjaman.peminjaman', compact('data'));
    }

    public function table(){
        $data = Peminjaman::all();
        return view('peminjaman.peminjaman', compact('data'));
    }

    public function tambahpeminjaman(){
        return view('peminjaman.tambahpeminjaman');
    }

    public function insert(Request $request){
        $data = Peminjaman::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'namabuku' => $request->namabuku,
            'tanggalpinjam' => $request->tanggalpinjam,
            'tanggalpengembalian' => $request->tanggalpengembalian,
            'jumlah' => $request->jumlah,
        ]);
        
        return redirect()->route('peminjaman')->with('success', 'Data Berhasil ditambahkan');
    }
}

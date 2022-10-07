<?php

namespace App\Http\Controllers;

use App\Models\Daftarbuku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Models\DaftarAnggota;

class PengembalianController extends Controller
{
    public function pengembalian(){
        $data = Pengembalian::all();
        return view('pengembalian.pengembalian', compact('data'));
    }

    public function table(){
        $data = Pengembalian::all();
        return view('pengembalian.pengembalian', compact('data'));
    }

    public function tambahpengembalian(){
        $data = DaftarAnggota::all();
        $buku = Daftarbuku::all();
        $pengembalin = Peminjaman::all();
        return view('pengembalian.tambahpengembalian', compact('data','buku','pengembalin'));
    }

    public function tambahpengembalianpost(request $request){
        $this->validate($request, [

            'transaksi' => ['required','unique:pengembalians,transaksi'],
            'nama' => 'required',
            'kelas' => 'required',
            'namabuku' => 'required',
            'tanggalpengembalian' => 'required',
            'jumlah' => 'required',
    
        ],[
            'transaksi.unique' => 'No transaksi sudah digunakan',
            'nama.required' => 'Nama Harus Di isi',
            'kelas.required' => 'Kelas Harus Di Isi',
            'namabuku.required' => 'Silahkan Pilih Buku',
            'tanggalpengembalian.required' => 'Isi Tangal Pengembalian',
            'jumlah.required' => 'Isi Jumlah Yang Ingi diPinjam',
        ]);

        $data = Pengembalian::create([
            'transaksi' => $request->transaksi,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'namabuku' => $request->namabuku,
            'kodebuku' => $request->kodebuku,
            'tanggalpengembalian' => $request->tanggalpengembalian,
            'jumlah' => $request->jumlah,
        ]);

        $databuku =  Daftarbuku::findOrFail($request->kodebuku);
        $databuku->jumlah += $request->jumlah;
        $databuku->save();
         
        return redirect()->route('pengembalian')->with('success', 'data berhasil ditambah');
    }

    public function deletepengembalian($id){
        $data = Pengembalian::find($id);
        $data->delete();
        return redirect()->route('pengembalian');
    }

}

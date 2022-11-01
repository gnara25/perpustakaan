<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Denda;
use App\Models\Daftarbuku;
use App\Models\Detailbuku;
use App\Models\Peminjaman;
use App\Models\Bukukembali;
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

    public function modalBK($id){
        $detail= Bukukembali::where('id_transaksi', $id)->get();
        return response()->json([
            'data' => $detail
        ]);
    }

    public function tambahpengembalian($id){
        \Cart::clear();
        $data = DaftarAnggota::all();
        $buku = Daftarbuku::all();
        $detail= detailbuku::where('id_transaksi', $id)->get();
        $pengembalin = Peminjaman::with('anggota','idbuku','denda')->findOrFail($id);
        
        return view('pengembalian.tambahpengembalian', compact('data','buku','pengembalin'))->with('detail',$detail);;
    }

    public function tambahpengembalianpost(request $request,$id){
        $this->validate($request, [
            'transaksi' => ['required','unique:pengembalians,transaksi'],
            'nama' => 'required',
            'kelas' => 'required',
            'tanggalpengembalian' => 'required',
        ],[
            'transaksi.unique' => 'No transaksi sudah digunakan',
            'nama.required' => 'Nama Harus Di isi',
            'kelas.required' => 'Kelas Harus Di Isi',
            'tanggalpengembalian.required' => 'Isi Tangal Pengembalian',
        ]);

        if ($request->denda > 0) {
             $data = Pengembalian::create([
            'transaksi' => $request->transaksi,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tanggalpengembalian' => $request->tanggalpengembalian,
        ])->id;
        $ss=Peminjaman::findOrFail($id);
        $ss->update([
            'status'=>'1',
        ]);
        // $databuku =  Daftarbuku::findOrFail($request->kodebuku);
        // $databuku->jumlah += $request->jumlah;
        // $databuku->save();

        } else {
            $ss=Peminjaman::findOrFail($id);
            $ss->update([
                'status'=>'1',
            ]);
        $data = Pengembalian::create([
            'transaksi' => $request->transaksi,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tanggalpengembalian' => $request->tanggalpengembalian,
        ])->id;
            $cart2 = \Cart::getContent();
            $array = array();
            foreach($cart2 as $carth){
                Bukukembali::create([
                    'id_transaksi' => $data,
                    'namabuku' => $carth->name,
                    'kodebuku' => $carth->attributes->kodebuku,
                    'jumlah' => $carth->quantity,
                    'denda' => $carth->price,
                ]);
            }
            // dd($cart2);
        }
               
        return redirect()->route('pengembalian')->with('success', 'data berhasil ditambah');
    }

    public function pilihbuku(Request $request){
        $databuku = array();
        foreach($request->id as $id){
            $buku = pengembalian::find($id);
            $databuku[] = $buku;
        }
    }

    public function deletepengembalian($id){
        $data = Pengembalian::find($id);
        $data->delete();
        return redirect()->route('pengembalian');
    }

}

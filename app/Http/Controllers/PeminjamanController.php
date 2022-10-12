<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\DaftarAnggota;
use App\Models\Daftarbuku;
use Illuminate\Http\Request;
use DB;

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
   public function getBooks(Request $request)
{
    $data = Daftarbuku::all();
    return json_encode($data);
}

    // public function getBooks(){
    //     $data = Daftarbuku::all();
    //     return json_encode($data);
    // }

    public function tambahpeminjaman() 
    {
        // $data = Peminjaman::all();
        $anggota = DaftarAnggota::all();
        $bukuid= Daftarbuku::all();
        $q = DB::table('peminjamen')->select(DB::raw('MAX(RIGHT(transaksi,5)) as kode'));
        $kd="";
        if($q->count()>0) 
        {
            foreach ($q->get() as $k) 
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%05s",$tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
        return view('peminjaman.tambahpeminjaman', compact('anggota','bukuid','kd'));
    }

    public function insert(Request $request){
     
        // dd($databuku);
        $this->validate($request,[
            'transaksi' => ['required','unique:peminjamen,transaksi,'],
            'nama' => 'required',
            'kelas' => 'required',
            'kodebuku' => 'required',
            'namabuku' => 'required',
            'jumlah' => 'required',

        ]);

        
        $databuku =  Daftarbuku::findOrFail($request->kodebuku);
        if ($databuku->jumlah >= $request->jumlah) {
            $data = Peminjaman::create([
            'transaksi' => $request->transaksi,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'kodebuku' => $request->kodebuku,
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

    public function scane(){
        return view('peminjaman.scane');
    }

    public function validasi(request $request){
        dd($request->all);
    }
}

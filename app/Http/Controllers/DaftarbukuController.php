<?php

namespace App\Http\Controllers;

use \PDF;
// use \DNS1D;
use App\Models\Kategori;
// use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Daftarbuku;
use Illuminate\Http\Request;
use DB;

class DaftarbukuController extends Controller
{
    public function beranda(){
        return view('index');
    }
    public function buku(){
        $data = Daftarbuku::with('idkategori')->get();
        $idkategori = Kategori::all();
        return view('buku.daftarbuku',compact('data','idkategori'));
    }
    public function tambahbuku(){
        $idkategori = Kategori::all();
        $data = Daftarbuku::all();

         $q = DB::table('Daftarbukus')->select(DB::raw('MAX(RIGHT(kodebuku,4)) as kode'));
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
            $kd = "0001";
        }
        return view('buku.tambahbuku',compact('data','idkategori','kd'));
    }
    public function tambahbukupost(Request $request){

        $this->validate($request,[
            'namabuku' => 'required',
            'kategori' => 'required',
            'kodebuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required',
            'halbuku' => 'required',
            'jumlah' => 'required',
            'lokasibuku' => 'required',
            'deskripsi' => 'required',
            'foto' => ['required','mimes:png,jpg,jpeg,gif,jfif'],

        ]);
        // dd($request);
        $data = Daftarbuku::create([
            'namabuku' => $request->namabuku,
            'kategori' => $request->kategori,
            'kodebuku' => $request->kodebuku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
            'halbuku' => $request->halbuku,
            'jumlah' => $request->jumlah,
            'lokasibuku' => $request->lokasibuku,
            'deskripsi' => $request->deskripsi,
            'dipinjam' => '0',
            'foto' => $request->foto,

        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobuku/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()-> route('buku')->with('success','Data berhasil ditambah');
    }

    public function editbuku ($id){
        $idkategori = Kategori::all();
        $data = Daftarbuku::findOrFail($id);
        return view('buku.editbuku', compact('data','idkategori'));
    }
    public function editbukupost(Request $request, $id){

        $data = Daftarbuku::find($id);
       $this->validate($request,[
            'namabuku' => 'required',
            'kategori' => 'required',
            'kodebuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required',
            'halbuku' => 'required',
            'jumlah' => 'required',
            'lokasibuku' => 'required',
            'deskripsi' => 'required',
            'foto' => ['mimes:png,jpg,jpeg,gif,jfif'],

        ]);
        $data->update([
            'namabuku' => $request->namabuku,
            'kategori' => $request->kategori,
            'kodebuku' => $request->kodebuku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
            'halbuku' => $request->halbuku,
            'jumlah' => $request->jumlah,
            'lokasibuku' => $request->lokasibuku,
            'deskripsi' => $request->deskripsi,
            'dipinjam' => $request->dipinjam,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobuku/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()-> route('buku')->with('success','Data berhasil diupdate');
    }

    public function deletebuku($id)
    {

        $data = Daftarbuku::find($id);
        $data->delete();
        return redirect()->route('buku')->with('success', 'Data Berhasil di Hapus');
    }

    public function cetakbarcode(Request $request){
        $databuku = array();
        foreach($request->id as $id){
            $buku = Daftarbuku::find($id);
            $databuku[] = $buku;
        }
        // return $databuku;
        $no  = 1;
        $pdf = PDF::loadView('buku.barcode', compact('databuku', 'no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('buku.pdf');
    }

    public function bukupop(){
        
        $data = Daftarbuku::with('idkategori')->get();
        $idkategori = Kategori::all();
        return view('buku.bukupop',compact('data','idkategori'));
    }
}

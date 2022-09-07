<?php

namespace App\Http\Controllers;

use App\Models\Daftarbuku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DaftarbukuController extends Controller
{
    public function beranda(){
        return view('index');
    }
    public function buku(){
        $data = Daftarbuku::with('idkategori')->get();
        // dd(Daftarbuku::with('idkategori'));
        return view('buku.buku',compact('data'));
    }
    public function tambahbuku(){
        $idkategori = Kategori::all();
        $data = Daftarbuku::all();
        return view('buku.tambahbuku',compact('data','idkategori'));
    }
    public function tambahbukupost(Request $request){
        
        $this->validate($request,[
            'foto' => ['required','mimes:png,jpg,jpeg,gif,jfif'],
            'nama' => 'required',
            'kategoribuku' => 'required',
            'kodebuku' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
        ]);
        $data = Daftarbuku::create([
            'foto' => $request->foto,
            'nama' => $request->nama,
            'kategoribuku' => $request->kategoribuku,
            'kodebuku' => $request->kodebuku,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->tahunterbit,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobuku/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()-> route('buku')->with('success','Data berhasil ditambah');
    }
}

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
        $data = Daftarbuku::all();
        $idkategori = Kategori::all();
        // dd(Daftarbuku::with('idkategori'));
        return view('buku.daftarbuku',compact('data','idkategori'));
    }
    public function tambahbuku(){
        $idkategori = Kategori::all();
        $data = Daftarbuku::all();
        return view('buku.tambahbuku',compact('data','idkategori'));
    }
    public function tambahbukupost(Request $request){
        
        $this->validate($request,[
            'nama' => 'required',
            'kategori' => 'required',
            'kodebuku' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required',
            'jumlah' => 'required',
            'foto' => ['required','mimes:png,jpg,jpeg,gif,jfif'],
            
        ]);
        // dd($request);
        $data = Daftarbuku::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'kodebuku' => $request->kodebuku,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
            'jumlah' => $request->jumlah,
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
            'foto' => ['mimes:png,jpg,jpeg,gif,jfif'],
            'nama' => 'required',
            'kategori' => 'required',
            'kodebuku' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
        ]);
        $data->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'kodebuku' => $request->kodebuku,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
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
}

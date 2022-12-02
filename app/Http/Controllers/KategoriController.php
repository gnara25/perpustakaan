<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Daftarbuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    public function kategori(){
        $data = Kategori::all();
        return view('kategori.kategori',compact('data'));
    }
    public function tambahkategori(){
        
        return view('kategori.tambahkategori');
    }
    public function tambahkategoripost(Request $request){
        $this->validate($request,[
            'kategori' => 'required',
        ],[
            'kategori'
        ]);
        $data = Kategori::create([
            'kategori' => $request->kategori,
        ]);
        return Redirect()->route('kategori')->with('success','Data Berhasil Ditambahkan');
       
    }
    public function editkategori($id){

        $data = Kategori::findOrFail($id);
        // dd($data);
        return view('kategori.editkategori', compact('data'));
    }
    public function editkategoripost(Request $request, $id){
        $data = Kategori::find($id);
        // dd($data);
        //  dd($request->all());
        $this->validate($request,[
            'kategori' => 'required',
        ]);
        $data->update([

            'kategori' => $request->kategori,
        ]);       
        return redirect('kategori')->with('success','Data berhasil diupdate');
    }

    public function deletekategori($id)
    {
        $count = Daftarbuku::where('kategori' ,$id)->count();

        if ($count > 0) {
            return back()->with('error', 'Kategori Buku Sedang Digunakan');
        } else{
            $data = Kategori::find($id);
            $data->delete();
            return redirect()->route('kategori')->with('success', 'Data Berhasil di Hapus'); 
        }
       
    }
    // public function create()
    // {
    //     return view('kategori.kategori');
    // }

    // public function createmodal(Request $request)
    // {
    //     $data['kategori'] = $request->kategori;
    //     Kategori::insert($data);

    //     return json_encode($data);
    // }
}

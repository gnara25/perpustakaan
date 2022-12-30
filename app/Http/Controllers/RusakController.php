<?php

namespace App\Http\Controllers;


use App\Models\Rusak;
use App\Models\Daftarbuku;
use Illuminate\Http\Request;

class RusakController extends Controller
{
    public function rusak(){
        $data = Rusak::with('idbukus')->get();
        $buku = Daftarbuku::all();
        return view('bukurusak.rusak',compact('data','buku'));
    }
    public function tambahrusakpost(Request $request){
        $this->validate($request,[
            'kodebuku' => 'required',
        ],[
            'kodebuku'
        ]);
        $rusak = Rusak::where('kodebuku',$request->kodebuku)->first();
    
        if(is_null($rusak)){
             $data = Rusak::create([
            'kodebuku' => $request->kodebuku,
            'namabuku' => $request->namabuku,
            'jumlah' => $request->jumlah,
            ]);
            $buku = Daftarbuku::where('id', $request->kodebuku)->update([
                'rusak' => $request->jumlah,
            ]);

        } else {

             $rusaks = Rusak::where('kodebuku',$request->kodebuku)->first();
             $jumlahrusak = $rusaks->jumlah;
            $jumlahpengurangan = $jumlahrusak + $request->jumlah;
            $rusaks->update([
                'jumlah' => $jumlahpengurangan
            ]);
            $bukus = Daftarbuku::where('id', $request->kodebuku)->first();
    
            $jumlahbukus = $bukus->rusak + $request->jumlah;
            $bukus->update([
                'rusak' => $jumlahbukus
            ]);
        }
       

        return Redirect()->route('rusak')->with('success','Data Berhasil Ditambahkan');
       
    }

      public function editrusak($id){

        $data = Rusak::findOrFail($id);
        $buku = Daftarbuku::all();
        // dd($data);
        return view('bukurusak.editrusak', compact('data','buku'));
    }

      public function editrusakpost(Request $request, $id){
        $data = Rusak::find($id);
     
        $this->validate($request,[
            'kodebuku' => 'required',
        ]);
        $data->update([
            'kodebuku' => $request->kodebuku,
            'namabuku' => $request->namabuku,
            'jumlah' => $request->jumlah,
        ]); 

          $buku = Daftarbuku::find($request->kodebuku)->update([
                'rusak' => $request->jumlah,
            ]);   
        return redirect('rusak')->with('success','Data berhasil diupdate');
    }
}

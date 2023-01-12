<?php

namespace App\Http\Controllers;

use DB;
use \PDF;
// use \DNS1D;
use App\Models\Kategori;
// use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Daftarbuku;
use Illuminate\Http\Request;
use App\Imports\DaftarbukuImport;
use Maatwebsite\Excel\Facades\Excel;

class DaftarbukuController extends Controller
{
    public function beranda(){
        return view('index');
    }
    public function buku(){
        $data = Daftarbuku::all();
        // $idkategori = Kategori::all();
        // $datah = \Illuminate\Support\Facades\DB::table('daftarbukus')
        //             ->join('kategoris', 'daftarbukus.kategori','kategoris.id')
        //             ->select('daftarbukus.*', 'kategoris.kategori')
        //             // ->sortByDesc('dipinjam')
        //             ->get();
        return view('buku.daftarbuku',compact('data',));
    }
    public function tambahbuku(){
        // $idkategori = Kategori::all();
        $data = Daftarbuku::all();

         $q = \Illuminate\Support\Facades\DB::table('Daftarbukus')->select(\Illuminate\Support\Facades\DB::raw('MAX(RIGHT(kodebuku,4)) as kode'));
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
        return view('buku.tambahbuku',compact('data','kd'));
    }
    public function tambahbukupost(Request $request){

        $this->validate($request,[
            'namabuku' => 'required',
            'kodebuku' => 'required',
            'pengarang' => 'required',
            'bukudatang' => 'required',
            'jumlah' => 'required',
            'lokasibuku' => 'required',
            'foto' => ['required','mimes:png,jpg,jpeg,gif,jfif'],
        ]);
        $data = Daftarbuku::create([
            'namabuku' => $request->namabuku,
            'kodebuku' => $request->kodebuku,
            'pengarang' => $request->pengarang,
            'bukudatang' => $request->bukudatang,
            'jumlah' => $request->jumlah,
            'rusak' => '0',
            'lokasibuku' => $request->lokasibuku,
            'dipinjam' => '0',
            'status' => 'tersedia',
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
        // $idkategori = Kategori::all();
        $data = Daftarbuku::findOrFail($id);
        return view('buku.editbuku', compact('data','idkategori'));
    }
    public function editbukupost(Request $request, $id){

        $data = Daftarbuku::find($id);
       $this->validate($request,[
            'namabuku' => 'required',
            'kodebuku' => 'required',
            'pengarang' => 'required',
            'bukudatang' => 'required',
            'jumlah' => 'required',
            'lokasibuku' => 'required',
            'foto' => ['mimes:png,jpg,jpeg,gif,jfif'],

        ]);
        $data->update([
            'namabuku' => $request->namabuku,
            'kodebuku' => $request->kodebuku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
            'halbuku' => $request->halbuku,
            'jumlah' => $request->jumlah,
            'rusak' => $request->rusak,
            'lokasibuku' => $request->lokasibuku,
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

    public function cetakbarcode(Request $request){
        // dd($request->id);
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

        $data = Daftarbuku::all()->sortByDesc('dipinjam');
        $idkategori = Kategori::all();
        return view('buku.bukupop',compact('data','idkategori'));
    }

    public function importexcel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_buku',$nama_file);

         // import data
         Excel::import(new DaftarbukuImport, public_path('/file_buku/'.$nama_file));

         // alihkan halaman kembali
        return redirect()->back()->with('success','Data Siswa Berhasil Diimport!');
    }
}

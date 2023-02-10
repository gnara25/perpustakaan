<?php

namespace App\Http\Controllers;

use DB;
use Cart;
use App\Models\Denda;
use App\Models\Daftarbuku;
use App\Models\Detailbuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\DaftarAnggota;
use App\Models\laporanpinjam;

class PeminjamanController extends Controller
{   
    public function peminjaman(){

        $data = Peminjaman::all();
        $namasiswa = DaftarAnggota::all();
        $id = 1;
        $detail = \Illuminate\Support\Facades\DB::table('detailbukus')
                  // ->form()  
                  ->join('Peminjamen','Peminjamen.id','=','detailbukus.id_transaksi','left') 
                  ->where('peminjamen.id', $id) 
                  ->get();

        $namabuku = Daftarbuku::all();
        return view('peminjaman.peminjaman', compact('data','namasiswa'))
        ->with('detail',$detail);
    }

    public function table(){
        $data = Peminjaman::with('buku');
        return view('peminjaman.peminjaman', compact('data'));
    }  

    public function detailbuku($id){
        $detail = Detailbuku::where('id_transaksi', $id)->get();
        $data = \Illuminate\Support\Facades\DB::table('peminjamen')
        ->join('detailbukus', 'detailbukus.id_transaksi', '=', 'peminjamen.id')
        ->where('peminjamen.id', $id)
        ->get();

        return view('peminjaman.detailbuku', compact('detail'))->with('data', $data);
    }

    public function tambahpeminjaman() 
    {
        \Cart::clear();
        $anggota = DaftarAnggota::all();
        $bukuid = Daftarbuku::all();

        $cartcount = \cart::getContent()->count();
        
        // dd($cartprice);
        $bukuid= Daftarbuku::all();
        $q = \Illuminate\Support\Facades\DB::table('peminjamen')->select(\Illuminate\Support\Facades\DB::raw('MAX(RIGHT(transaksi,5)) as kode'));
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

        return view('peminjaman.tambahpeminjaman', compact('anggota','bukuid','kd','cartcount'));
    }

    public function autoscane(Request $request)
    {
            $array = array();
            $data = DaftarAnggota::where('nisn',$request->nisn)->first();
            return json_encode($data);
    }

    public function insert(Request $request){
     
        $this->validate($request,[
            'transaksi' => ['required','unique:peminjamen,transaksi,'],
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        // if ($detailbuku > 0) {
        $data = Peminjaman::create([
            'transaksi' => $request->transaksi,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tanggalpengembalian' => $request->tanggalpengembalian,
        ])->id;

        $lapor = laporanpinjam::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ])->id;

        $cart1 = Cart::getContent();
        $array = array();
        foreach($cart1 as $cart){
            $databuku = Daftarbuku::find($cart->id);
            Detailbuku::create([
                'id_buku' => $cart->id,
                'id_siswa' => $request->idsiswa,
                'id_transaksi' => $data,
                'id_laporan' => $lapor,
                'namabuku' => $cart->name,
                'kodebuku' => $cart->attributes->kodebuku,
                'jumlah' => $cart->quantity,
                'jumlahlaporan' => $cart->quantity,
                'denda' => $cart->price,
                'status' => 'dipinjam',
                'tglpengembalian' => $request->tanggalpengembalian,
            ]);
            $databuku->dipinjam += 1;
            // $databuku->jumlah -= $cart->quantity;
            $databuku->save();
        }
        
        return redirect()->route('peminjaman')->with('success', 'Data Berhasil ditambahkan');
    }

    public function editpeminjaman($id){

        $data = Peminjaman::findOrFail($id);
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

     public function tambahpinjam2() 
    {
        \Cart::clear();
        $anggota = DaftarAnggota::all();

        $cartcount = \Cart::getContent()->count();
        // dd($cartcount);
        $bukuid= Daftarbuku::all();
               $q = \Illuminate\Support\Facades\DB::table('peminjamen')->select(\Illuminate\Support\Facades\DB::raw('MAX(RIGHT(transaksi,5)) as kode'));
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

        return view('peminjaman.tambahpinjam2', compact('anggota','bukuid','kd','cartcount'));
    }

    public function autofill(Request $request)
    {
            $array = array();
            $data = DaftarAnggota::where('nisn',$request->nisn)->first();
            return json_encode($data);
       
    }

    public function scanebuku(Request $request){
         
            $array = array();
            $data = Daftarbuku::where('kodebuku',$request->kodebuku)->first();
            return json_encode($data);

    }

    public function cari(Request $request){
        $output = "";

        $bukuid = Daftarbuku::where('kodebuku','Like','%' .$request->cari. '%')->get();

        foreach($bukuid as $row)
        {
            $output.=  '<tr>
                        <td> '.$row->no.' </td>
                        <td> '.$row->namabuku.' </td>
                        <td> '.$row->idkategori->kategori.' </td>
                        <td> '.$row->kodebuku.' </td>
                        <td> '.$row->penerbit.' </td>
                        <td> '.$row->tahunterbit.' </td>
                        <td> '.$row->jumlah.' </td>
                        <td> '.$row->deskripsi.' </td>
                        <td> <img src="http://127.0.0.1:8000/fotobuku/'.$row->foto.' " alt=""
                                                style="width: 50px; height: 50px">
                                        </td>
                        <td style="width:17%">
                                                <input type="hidden" value=" '.$row->id.' " name="id">
                                                <input type="hidden" value=" '.$row->namabuku.' " name="namabuku">
                                                <input type="hidden" value=" '.$row->kodebuku.' " name="kodebuku">
                                                <input type="hidden" value=".1." name="quantity">

                                                <button class="btn btn-primary" id="Select_File2"
                                                    onclick="tambah(this)"
                                                    data-id=" '.$row->id.' " data-nama=" '.$row->namabuku.' " data-kode=" '.$row->kodebuku.'" data-bs-dismiss="modal">
                                                    <i class="fa fa-check"> </i> Pilih
                                                </button>
                                        </td>
                        
                        </tr>';
        }
        return response($output);
    }

}

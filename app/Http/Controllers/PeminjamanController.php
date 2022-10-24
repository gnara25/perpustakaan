<?php

namespace App\Http\Controllers;

use DB;
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
        // $detail = Peminjaman::with('detailid')->get();
        $namasiswa = DaftarAnggota::all();
        $detail= Detailbuku::with('detail')->get();
        // dd($detail);
        // dd($bukuid);
        $namabuku = Daftarbuku::all();
        return view('peminjaman.peminjaman', compact('data','namasiswa','detail'));
    }

    public function table(){
        $data = Peminjaman::with('buku');
        return view('peminjaman.peminjaman', compact('data'));
    }
   public function getBooks(Request $request)
{
    $data = Daftarbuku::all();
    // $data = Daftarbuku::where('id', $id)
    //         ->select('Daftarbuku.namabuku', 'Daftarbuku.kodebuku',)
    //         ->first();

    return json_encode($data);
}
// public function detailbuku(){
//     $bukuid= Daftarbuku::all();
//     return view('peminjaman.detailbuku',compact('bukuid'));
// }

    // public function getBooks(){
    //     $data = Daftarbuku::all();
    //     return json_encode($data);
    // }

    public function tambahpeminjaman() 
    {
        \Cart::clear();
        // $data = Peminjaman::all();
        $anggota = DaftarAnggota::all();
        $bukuid= Daftarbuku::all();
        // dd($cartItems);
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
        ]);

        // $databuku =  Daftarbuku::findOrFail($request->kodebuku);
        // if ($databuku->jumlah >= $request->jumlah) {
            $data = Peminjaman::create([
            'transaksi' => $request->transaksi,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tanggalpengembalian' => $request->tanggalpengembalian,
        ])->id;

        // $cart = \cart::all();

        $cart1 = \Cart::getContent();
        $array = array();
        // $id = Peminjaman::find('id');
        foreach($cart1 as $cart){
            // array_push($array,http://localhost/phpmyadmin/index.php
            Detailbuku::create([
                'id_transaksi' => $data,
                'namabuku' => $cart->name,
                'kodebuku' => $cart->attributes->kodebuku,
                'jumlah' => $cart->quantity,
            ]);

            // );

        // foreach($cart1 as $cart){
        //     array_push($array,http://localhost/phpmyadmin/index.php
        //     Detailbuku::create([
        //         'id_transaksi' => $data,
        //         'namabuku' => $cart->name,
        //         'kodebuku' => $cart->attributes->kodebuku,
        //         'jumlah' => $cart->quantity,
        //     ])

        //     );
        }

        $denda = Denda::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'peminjaman_id'=>  $data,
        ]);

        // $detailbuku = Detailbuku::create([
        //     'namabuku' => $request->namabuku,
        //     'kodebuku' => $request->kodebuku,
        //     'jumlah' => $request->jumlah,
        // ])->id;

        // $pinjam = laporanpinjam::create([
        //     'nama' => $request->nama,
        //     'kelas' => $request->kelas,
        //     'namabuku' => $request->namabuku,
        //     'jumlah' => 1,
        // ]);

        //     $databuku->jumlah -= $request->jumlah;
        //     $databuku->save();
        // }else  {
        //     return redirect()->back()->with('error','Jumlah Buku Kurang');
        // }
        
        
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
     public function tambahpinjam2() 
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
        return view('peminjaman.tambahpinjam2', compact('anggota','bukuid','kd'));
    }

    public function result()
    {   
        
        $user = DaftarAnggota::all();
        error_reporting(0);
        if($user->nama != null)
        {
            echo '<table class="table table-striped">
                        <tr>
                            <td>Nama Anggota</td>
                            <td>:</td>
                            <td>{{$user->nama}}</td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>:</td>
                            <td>{{$user->kelas}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{$user->alamat}}</td>
                        </tr>
                    </table>';
        }else{
            echo 'Anggota Tidak Ditemukan !';
        }
        
    }

    public function cart(){
        $Product = Daftarbuku::find($productId); // assuming you have a Product model with id, name, description & price
$rowId = 456; // generate a unique() row ID
$userID = 2; // the user ID to bind the cart contents

// add the product to cart
\Cart::session($userID)->add(array(
    'id' => $rowId,
    'name' => $Product->name,
    'price' => $Product->price,
    'quantity' => 4,
    'attributes' => array(),
    'associatedModel' => $Product
));
    }


}

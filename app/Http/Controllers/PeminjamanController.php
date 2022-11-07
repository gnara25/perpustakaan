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
        $namasiswa = DaftarAnggota::all();
        $id = 1;
        $detail = DB::table('detailbukus')
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
   public function getBooks(Request $request)
{
    $data = Daftarbuku::all();
    // $data = Daftarbuku::where('id', $id)
    //         ->select('Daftarbuku.namabuku', 'Daftarbuku.kodebuku',)
    //         ->first();

    return json_encode($data);
}
// public function detailbuku($id){
//     $detail= detailbuku::where('id_transaksi', $id)->get();
//     return response()->json([
//         'data' => $detail
//     ]);
// }    

    public function detailbuku($id){
        $detail = Detailbuku::where('id_transaksi', $id)->get();
        $data = DB::table('peminjamen')
        ->join('detailbukus', 'detailbukus.id_transaksi', '=', 'peminjamen.id')
        ->where('peminjamen.id', $id)
        ->get();

        // return view('peminjaman.detailbuku')->with('data', $data);
        return view('peminjaman.detailbuku', compact('detail'))->with('data', $data);
    }

    public function tambahpeminjaman() 
    {
        \Cart::clear();
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
        
        // $u_denda = 1000;
                                        
        // $tgl1 = date('Y-m-d');
        // $tgl2 = $buku->tanggalpengembalian;
        
        // $pecah1 = explode('-', $tgl1);
        // $date1 = $pecah1[2];
        // $month1 = $pecah1[1];
        // $year1 = $pecah1[0];
        
        // $pecah2 = explode('-', $tgl2);
        // $date2 = $pecah2[2];
        // $month2 = $pecah2[1];
        // $year2 = $pecah2[0];
        
        // $jd1 = GregorianToJD($month1, $date1, $year1);
        // $jd2 = GregorianToJD($month2, $date2, $year2);
        
        // $selisih = $jd1 - $jd2;
        // $denda = $selisih * $u_denda;

        $lapor = laporanpinjam::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ])->id;

        $cart1 = \Cart::getContent();
        $array = array();
        foreach($cart1 as $cart){
            $databuku = Daftarbuku::find($cart->id);
            Detailbuku::create([
                'id_siswa' => $request->nama,
                'id_transaksi' => $data,
                'id_laporan' => $lapor,
                'namabuku' => $cart->name,
                'kodebuku' => $cart->attributes->kodebuku,
                'jumlah' => $cart->quantity,
                'denda' => $cart->price,
                'tglpengembalian' => $request->tanggalpengembalian,
            ]);
            $databuku->dipinjam += 1;
            $databuku->jumlah -= $cart->quantity;
            $databuku->save();
        }

        // $denda = Denda::create([
        //     'nama' => $request->nama,
        //     'kelas' => $request->kelas,
        //     'peminjaman_id'=>  $data,
        // ]);
        
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

    public function validasi(request $request){
        dd($request->all);
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

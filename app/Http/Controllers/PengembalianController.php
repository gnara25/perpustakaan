<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Denda;
use App\Models\Daftarbuku;
use App\Models\Detailbuku;
use App\Models\Peminjaman;
use App\Models\Bukukembali;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Models\DaftarAnggota;

class PengembalianController extends Controller
{
    public function pengembalian(){
        $data = Pengembalian::all();
        return view('pengembalian.pengembalian', compact('data'));
    }

    public function table(){
        $data = Pengembalian::all();
        return view('pengembalian.pengembalian', compact('data'));
    }

    public function modalBK($id){
        $detail= Bukukembali::where('id_transaksi', $id)->get();
        return response()->json([
            'data' => $detail
        ]);
    }

    public function tambahpengembalian($id){
        \Cart::clear();
        $data = DaftarAnggota::all();
        $buku = Daftarbuku::all();
        // $cartbuku = \Cart::getContent();
        $total = \Cart::getSubTotal();
        // foreach ($cartbuku as $cartk){
            // $total = $cartbuku->getPriceSum();
        // }
        
        // $detail= detailbuku::where('id_transaksi', $id)->get();
        $pengembalin = Peminjaman::with('anggota','idbuku')->findOrFail($id);
        $detail = DB::table('peminjamen')
        ->join('detailbukus', 'detailbukus.id_transaksi', '=', 'peminjamen.id')
        ->where('peminjamen.id', $id)
        ->get();
        
        return view('pengembalian.tambahpengembalian', compact('data','buku','pengembalin'))->with('detail',$detail);;
    }

    public function pilihan(Request $request)
         {

        if ($request->id_transaksi) {
        $assignFeature = Detailbuku::where('id_transaksi', 1)->exists();
        if ($assignFeature) {
            $response['error'] = 'Product is already featured';
            return response()->json($response, 422);
        }
    }
    $id = $request->input('id');
    $pilihan = $request->input('id_transaksi');
    $featurediItem = Detailbuku::find($id);
    if ($featurediItem->update(['id_transaksi' => $pilihan])) {

        // form helpers.php
        logAction($request);

        $response['id_transaksi'] = true;
        $response['message'] = 'product featured updated successfully.';
        return response()->json($response, 200);
    }
}

    public function tambahpengembalianpost(request $request,$id){
        $this->validate($request, [
            'transaksi' => ['required','unique:pengembalians,transaksi'],
            'nama' => 'required',
            'kelas' => 'required',
            'tanggalpengembalian' => 'required',
        ],[
            'transaksi.unique' => 'No transaksi sudah digunakan',
            'nama.required' => 'Nama Harus Di isi',
            'kelas.required' => 'Kelas Harus Di Isi',
            'tanggalpengembalian.required' => 'Isi Tangal Pengembalian',
        ]);
        if ($request->denda > 0) {
             $data = Pengembalian::create([
            'transaksi' => $request->transaksi,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tanggalpengembalian' => $request->tanggalpengembalian,
        ])->id;
        $ss=Peminjaman::findOrFail($id);
        $ss->update([
            'status'=>'1',
        ]);
        // $databuku =  Daftarbuku::findOrFail($request->kodebuku);
        // $databuku->jumlah += $request->jumlah;
        // $databuku->save();

        } else {
            $ss=Peminjaman::findOrFail($id);
            $ss->update([
                'status'=>'1',
            ]);
        $data = Pengembalian::create([
            'transaksi' => $request->transaksi,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tanggalpengembalian' => $request->tanggalpengembalian,
        ])->id;

        $cartcount = \Cart::getContent()->count();
            $cart1 = \Cart::getContent();
            $cart2 = \Cart::getContent();
            $array = array();
         
            foreach($cart1 as $carts){
                $total = $cartcount * $carts->price;
            }
           $denda = Denda::create([
                    'nama' => $request->nama,
                    'kelas' => $request->kelas,
                    'denda' => $total,
                ])->id;

            foreach($cart2 as $carth){
                $databuku = Daftarbuku::find($carth->id);
                Bukukembali::create([
                    'id_transaksi' => $data,
                    'namabuku' => $carth->name,
                    'kodebuku' => $carth->attributes->kodebuku,
                    'jumlah' => $carth->quantity,
                    'denda' => $carts->price,
                    'id_denda' => $denda,
                ]);

                $databuku->jumlah += $cart->quantity;
                $databuku->save();
                 
            }
                    
        }           
        return redirect()->route('pengembalian')->with('success', 'data berhasil ditambah');
    }

    public function deletepengembalian($id){
        $data = Pengembalian::find($id);
        $data->delete();
        return redirect()->route('pengembalian');
    }

}   

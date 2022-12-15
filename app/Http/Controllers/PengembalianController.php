<?php

namespace App\Http\Controllers;

use DB;
use \PDF;
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

    // public function disabled(Request $request){
    //     $user = auth()->user();
    //     $buku = Detailbuku::all();

    //     $buku->id_pilih = $user->id;
    //     $buku->is_confirmed = 1;
    //     if (!$buku->save()) {
    //         return response()->json([ 'success' => false ], 500); //Error response
    //     }
    
    
    //     return response()->json([ 'success' => true ]);
    // }

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
        $total = \Cart::getSubTotal();

        $pengembalin = Peminjaman::with('anggota','idbuku')->findOrFail($id);
        $detail = \Illuminate\Support\Facades\DB::table('peminjamen')
        ->join('detailbukus', 'detailbukus.id_transaksi', '=', 'peminjamen.id')
        ->where('peminjamen.id', $id)
        ->get();
        
        return view('pengembalian.tambahpengembalian', compact('data','buku','pengembalin','total'))->with('detail',$detail);;
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
            'transaksi' => ['required'],
            'nama' => 'required',
            'kelas' => 'required',
            'tanggalpengembalian' => 'required',
        ],[
            'transaksi.unique' => 'No transaksi sudah digunakan',
            'nama.required' => 'Nama Harus Di isi',
            'kelas.required' => 'Kelas Harus Di Isi',
            'tanggalpengembalian.required' => 'Isi Tangal Pengembalian',
        ]);

         $cart1 = \Cart::getContent();
         $cartcount = \Cart::getContent()->count();

        

        $kilis = Detailbuku::where('id_transaksi',$id)->where('status','dipinjam')->count();
        // dd($kilis);

        // foreach($cart1 as $carts){
       //   $kilis = Detailbuku::where('id_transaksi',$id)->where('kodebuku',$carts->attributes->kodebuku)->where('status','dipinjam')->first();
       // }
        if ($kilis > 0){

         $data = Pengembalian::create([
            'transaksi' => $request->transaksi,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tanggalpengembalian' => $request->tanggalpengembalian,
        ])->id;

         
             foreach($cart1 as $carts){
                $kdbuku = $carts->attributes->kodebuku;
             $total = $cartcount * $carts->price;
             $kilos = Detailbuku::where('id_transaksi',$id)->where('kodebuku',$carts->attributes->kodebuku)->first();
              
        }

           $denda = Denda::create([
                    'nama' => $request->nama,
                    'kelas' => $request->kelas,
                    'denda' => $request->subtotal,
                ])->id;

            foreach($cart1 as $carth){
                $databuku = Daftarbuku::find($carth->id);
                Bukukembali::create([
                    'id_transaksi' => $data,
                    'namabuku' => $carth->name,
                    'kodebuku' => $carth->attributes->kodebuku,
                    'jumlah' => $carth->quantity,
                    'denda' => $carts->total,
                    'id_denda' => $denda,
                ]);

               
                $databuku->jumlah += $carth->quantity;
                $databuku->save();
        
            }

        } else {

             $data = Pengembalian::create([
            'transaksi' => $request->transaksi,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tanggalpengembalian' => $request->tanggalpengembalian,
        ])->id;


             foreach($cart1 as $carts){
                $total = $cartcount * $carts->price;    
                $kilo = Detailbuku::where('id_transaksi',$id)->where('kodebuku',$carts->attributes->kodebuku)->first();          
            }
            $denda = Denda::create([
                    'nama' => $request->nama,
                    'kelas' => $request->kelas,
                    'denda' => $request->subtotal,
                ])->id;
          
            foreach($cart1 as $carth){
                $databuku = Daftarbuku::find($carth->id);
                Bukukembali::create([
                    'id_transaksi' => $data,
                    'namabuku' => $carth->name,
                    'kodebuku' => $carth->attributes->kodebuku,
                    'jumlah' => $carth->quantity,
                    'denda' => $carts->total,
                    'id_denda' => $denda,
                ]);
   
                $databuku->jumlah += $carth->quantity;
                $databuku->save();
               
            }

            $ss=Peminjaman::findOrFail($id);
            $ss->update([
                'status'=>'1',
            ]);
                        
        }           
         return redirect()->route('pengembalian')->with('success', 'data berhasil ditambah');
    }

    public function deletepengembalian($id){
        $data = Pengembalian::find($id);
        $data->delete();
        return redirect()->route('pengembalian');
    }
    public function cetakpengembalian()
    {
        $data = Pengembalian::all();
 
        $pdf = PDF::loadview('pengembalian.pengembalianpdf', ['data' => $data]);
        return $pdf->download('laporan-pengembalian.pdf');
    }

}   

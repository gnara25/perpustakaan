<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Daftarbuku;
use App\Models\Detailbuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cartpost(Request $request)
    {
        $Product = Daftarbuku::where('kodebuku', $request->id)->first();

        if($Product->status == 'tersedia') {

            $sek = $Product->jumlah - 1;
                $Product->update([
                    'jumlah' => $sek,
                ]);
                
             if($Product->jumlah == 0) { 
                $Product->update([
                    'status' => 'tidak tersedia',
                ]);
            }   
                Cart::add([
                    'id' => $Product->id,
                    'name' => $Product->namabuku,
                    'price' => 1000,
                    'quantity' => 1,
                    'attributes' => array(
                    'kodebuku' => $Product->kodebuku,
                    )
                ]);
            
        } else {
            return response()->json('gagal'); 
            
        }

        return response()->json('berhasil');
    }

    public function cartpost2()
    {
        $data = DB::where('daftarbukus', 'id')->first();
        $Product = Daftarbuku::findOrFail($data); 
        \Cart::add([
            'id' => $Product->id,
            'name' => $Product->namabuku,
            'price' => 1000,
            'quantity' => 1,
            'attributes' => array(
            'kodebuku' => $Product->kodebuku,
          )
        ]);

        dd($Product);
        return response()->json('berhasil');
    }

    public function cartList()
    {
        $array = array();
        $cartItems = \Cart::getContent();
        foreach($cartItems as $cart){
            array_push($array, $cart);
        }
        // dd(json_encode($array));
        return response()->json([
            'data' => $array,
    ]);
    }

    public function remove($id)
    {

        $cartbuku = \Cart::getContent($id)->where('id',$id);
     

        foreach($cartbuku as $pinjam){
             $iddetail = Daftarbuku::where('kodebuku',$pinjam->attributes->kodebuku)->first();
         
            if($iddetail->jumlah == 0) {
                $iddetail->update(['status' => 'tersedia']);
            }
        
        $sek = $iddetail->jumlah + $pinjam->quantity;
            $iddetail->update([
                'jumlah' => $sek,
            ]);  
        }

       \Cart::remove($id);
       
        return response()->json('berhasil');
    }

    public function decrementQuantity($id){

        \Cazrt::update($id, array(
            'quantity' => +1,
         ));
        
        return response()->json('berhasil');
    }
    public function incrementQuantity($id){

         $cartbuku = \Cart::getContent($id)->where('id',$id);

         foreach($cartbuku as $buku){
         $detailid = Daftarbuku::where('kodebuku',$buku->attributes->kodebuku)->first();
         
        if($buku->quantity == 0) {
           \Cart::remove($id);
        }

        $sek = $detailid->jumlah + 1;
            $detailid->update([
                'jumlah' => $sek,
            ]);  
        }

        if($detailid->status = 'tidak tersedia'){
            $detailid->update([
                'status' => 'tersedia',
            ]);
        }

        \Cart::update($id, array(
            'quantity' => -1,
         ));

        
        return response()->json('berhasil');
    }

    public function postcart(Request $request)
    {
        // dd($request->denda);
        $detailid = Detailbuku::where('id_transaksi', $request->id)->where('kodebuku',$request->kodebuku)->first();
        if ($detailid->status == 'dipinjam') {
            
            $sek = $detailid->jumlah - 1;
            $detailid->update([
                'jumlah' => $sek,
            ]);

            if($detailid->jumlah == 0) {
                $detailids = Detailbuku::where('id_transaksi', $request->id)->where('kodebuku',$request->kodebuku)->update(['status' => 'dikembalikan']);
            }

            $cart = \Cart::add([
                'id' => $detailid->id_buku,
                'name' => $detailid->namabuku,
                'price' => $request->denda,
                'quantity' => 1,
                'attributes' => array(
                'id_remove' => $request->id,
                'id_detail' => $detailid->id,   
                'kodebuku' => $detailid->kodebuku,
                 )
            ]);


        } else {

            return response()->json('gagal');
        }

        return response()->json('berhasil');
    }
    public function Listcart()
    {
        $array = array();
        
        $cartbuku = \Cart::getContent();
        $subtotal = \Cart::getSubTotal();
        foreach($cartbuku as $cartbuku){
            $itemId = $cartbuku->id;
            $total = Cart::get($itemId)->getPriceSum();
            $cartbuku['subtotal'] = $subtotal;
            $cartbuku['total'] = $total;
            // $subtotal = $cartbuku->getSubTotal();
            array_push($array, $cartbuku);   
        }
        // dd($subtotal);
        return response()->json(['data' => $array]);
    }

    public function pilihbuku($id){
        $databuku = array();
        foreach($request->id as $id){
            $data = pengembalian::find($id);
            $databuku[] = $data;
        }
    }

    public function remov($id)
    {


        $cartbuku = \Cart::getContent($id)->where('id',$id);
     

        foreach($cartbuku as $buku){
         $detailid = Daftarbuku::where('id_transaksi', $buku->attributes->id_remove)->where('kodebuku',$buku->attributes->kodebuku)->first();
         
        if($detailid->jumlah == 0) {
            $detailid->update(['status' => 'dipinjam']);
        }
        $sek = $detailid->jumlah + $buku->quantity;
            $detailid->update([
                'jumlah' => $sek,
            ]);  
        }
        
         
        \Cart::remove($id);
        return response()->json('berhasil');
    }
}
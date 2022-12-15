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
        $Product = Daftarbuku::where('kodebuku',$request->id)->first();
        Cart::add([
            'id' => $Product->id,
            'name' => $Product->namabuku,
            'price' => 1000,
            'quantity' => 1,
            'attributes' => array(
            'kodebuku' => $Product->kodebuku,
          )
        ]);

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
       \Cart::remove($id);
       
        return response()->json('berhasil');
    }

    public function decrementQuantity($id){

        \Cart::update($id, array(
            'quantity' => +1,
         ));
        
        return response()->json('berhasil');
    }
    public function incrementQuantity($id){

        \Cart::update($id, array(
            'quantity' => -1,
         ));
        
        return response()->json('berhasil');
    }

    public function postcart(Request $request)
    {
        // dd($request->denda);
        $detailid = Detailbuku::where('id_transaksi', $request->id)->where('kodebuku',$request->kodebuku)->first();
        $cart = \Cart::add([
                'id' => $detailid->id_buku,
                'name' => $detailid->namabuku,
                'price' => $request->denda,
                'quantity' => 1,
                'attributes' => array(
                'id_detail' => $detailid->id,   
                'kodebuku' => $detailid->kodebuku,
                 )
            ]);

            $sek = $detailid->jumlah - 1;
            $detailid->update([
                'jumlah' => $sek,
            ]);

            if($detailid->jumlah == 0) {
                $detailids = Detailbuku::where('id_transaksi', $request->id)->where('kodebuku',$request->kodebuku)->update(['status' => 'dikembalikan']);
            }

        // dd($sek);
        
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
        \Cart::remove($id);

        return response()->json('berhasil');
    }
}
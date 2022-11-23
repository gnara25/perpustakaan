<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartpost(Request $request)
    {
        \Cart::add([
            'id' => $request->idbuku,
            'name' => $request->name,
            'price' => 1000,
            'quantity' => 1,
            'attributes' => array(
            'kodebuku' => $request->kodebuku,
          )
        ]);
        // session()->flash('success', 'Product is Added to Cart Successfully !');

        // return redirect()->back() ;
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
        return response()->json(['data' => $array]);
    }

    public function remove($id)
    {
       \Cart::remove($id);
        // array_push($arraypo, $remove);
        return response()->json('berhasil');
    }

    public function postcart(Request $request)
    {
        $cart = \Cart::add([
                'id' => $request->id,
                'name' => $request->namabuku,
                'price' => $request->price,
                'quantity' => 1,
                'attributes' => array(
                'id_detail' => $request->id_detail,    
                'kodebuku' => $request->kodebuku,
                 )
            ]);
        // session()->flash('success', 'Product is Added to Cart Successfully !');

        // return redirect()->back() ;
        return response()->json('berhasil');
    }

    public function Listcart()
    {
        $array = array();
        $cartbuku = \Cart::getContent();
        foreach($cartbuku as $cartbuku){
            array_push($array, $cartbuku);
            // $total = $cartbuku->getPriceSum();
        }
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
        // session()->flash('success', 'Item Cart Remove Successfully !');

        return response()->json('berhasil');
    }
}
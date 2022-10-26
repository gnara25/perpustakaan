<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartpost(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->namabuku,
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
        session()->flash('success', 'Item Cart Remove Successfully !');

        return response()->json('berhasil');
    }

}
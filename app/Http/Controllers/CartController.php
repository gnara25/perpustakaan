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
            if($Product->jumlah == $Product->rusak){
                return response()->json('rusak');
            } else {
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
            }
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

        $cartbuku = \Cart::getContent($id)->where('id',$id);


        foreach($cartbuku as $pinjam){

             $iddetail = Daftarbuku::where('kodebuku',$pinjam->attributes->kodebuku)->first();

            if($iddetail->jumlah > 0) {


                $sek = $iddetail->jumlah - 1;
                $iddetail->update([
                    'jumlah' => $sek,
                ]);

                \Cart::update($id, array(
                    'quantity' => +1,
                 ));
                if($iddetail->jumlah == 0){
                      $iddetail->update(['status' => 'tidak tersedia']);
                }
            } else {

            return response()->json('gagal');

            }
        }

        return response()->json('berhasil');
    }
    public function kurang($id){

         $cartbuku = \Cart::getContent($id)->where('id',$id);


        foreach($cartbuku as $pinjam){
             $iddetail = Daftarbuku::where('kodebuku',$pinjam->attributes->kodebuku)->first();

            if($pinjam->quantity > 1) {
                $sek = $iddetail->jumlah + 1;
                $iddetail->update([
                    'jumlah' => $sek,
                ]);

                \Cart::update($id, array(
                    'quantity' => -1,
                 ));
                if($iddetail->jumlah > 0){
                      $iddetail->update(['status' => 'tersedia']);
                }
            } else {

            return response()->json('gagal');

            }
        }
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

        return response()->json([
            'msg' => 'berhasil',
            'buku' => $request->kodebuku,
            'sisa' => $sek
        ]);
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
            array_push($array, $cartbuku);
        }
        // dd($subtotal);
        return response()->json(['data' => $array]);
    }

    public function remov($id)
    {


        $cartbuku = \Cart::getContent($id)->where('id',$id);


        foreach($cartbuku as $buku){
         $detailid = Detailbuku::where('id_transaksi', $buku->attributes->id_remove)->where('kodebuku',$buku->attributes->kodebuku)->first();

        if($detailid->jumlah == 0) {
            $detailid->update(['status' => 'dipinjam']);
        }
        $sek = $detailid->jumlah + $buku->quantity;
            $detailid->update([
                'jumlah' => $sek,
            ]);
        }



        \Cart::remove($id);
        return response()->json([
            'msg' => 'berhasil',
            'buku' => $buku->attributes->kodebuku,
            'sisa' => $sek
        ]);
    }
    public function cartbuku(Request $request)
    {
        $Product = Daftarbuku::where('kodebuku', $request->id)->first();

        if($Product->status == 'tersedia') {
            if($Product->jumlah == $Product->rusak){
                return response()->json('rusak');
            } else {
                Cart::session($userId)->add(array(
                    'id' => $Product->id,
                    'name' => $Product->namabuku,
                    'price' => 1000,
                    'quantity' => 1,
                    'attributes' => array(
                    'kodebuku' => $Product->kodebuku,
                    )
                ));
            }

            return response()->json('gagal');

        }

        return response()->json('berhasil');
    }

//     public function mengurangi($id){

//         $cartbuku = \Cart::getContent($id)->where('id',$id);


//        foreach($cartbuku as $pinjam){
//             $iddetail = Detailbuku::where('id_transaksi', $pinjam->attributes->id_remove)->where('kodebuku',$pinjam->attributes->kodebuku)->first();

//            if($pinjam->quantity > 1) {
//                $sek = $iddetail->jumlah + 1;
//                $iddetail->update([
//                    'jumlah' => $sek,
//                ]);

//                \Cart::update($id, array(
//                    'quantity' => -1,
//                 ));
//                if($iddetail->jumlah > 0){
//                      $iddetail->update(['status' => 'dipinjam']);
//                }
//            } else {

//            return response()->json('gagal');

//            }
//        }
//        return response()->json('berhasil');

//    }
}

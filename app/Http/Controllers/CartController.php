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
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('tambahpeminjaman') ;
    }
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('peminjaman.cart', compact('cartItems'));
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('tambahpeminjaman');
    }

    public function buku_list()
    {
    $output = '';
    $output .= ' <table  class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Judul Buku</th>
                                                        <th>Kode Buku</th>
                                                        <th>Jumlah</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($cartItems as $row)
                                                        <tr>
                                                            <td scope="row">{{ $no++ }}</td>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->attributes->kodebuku }}</td>
                                                            <td>{{ $row->quantity }}</td>
                                                            <td class="hidden text-right md:table-cell">
                                                            
                                
                              </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>';
             return $output;                               

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

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
}

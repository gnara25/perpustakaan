<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laporanpinjam;

class LaporanpinjamController extends Controller
{
    public function laporanpinjam (){
        $data = laporanpinjam::all();
        return view('laporan.peminjaman', compact('data'));
    }
}

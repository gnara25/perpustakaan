<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function denda (){
        return view('laporan.denda');
    }
    public function laporanpinjam (){
        return view('laporan.peminjaman');
    }
}

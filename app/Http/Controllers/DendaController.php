<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function denda (){
        $data = Denda::all();
        return view('laporan.denda', compact('data'));
    }
    public function laporanpinjam (){
        return view('laporan.peminjaman');
    }
}

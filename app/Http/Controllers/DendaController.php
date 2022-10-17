<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function denda (){
        $data = Denda::with('peminjaman.anggota')->get();
        // $denda=Denda::whereRaw('tanggalpengembalian > now()')->update([
        //     'denda'=> '1000'
        // ])->daily();
        return view('laporan.denda', compact('data'));
    }
   
}

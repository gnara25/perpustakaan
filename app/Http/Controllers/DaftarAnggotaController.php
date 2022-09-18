<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarAnggota;
use App\Http\Controllers\DaftarAnggotaController;

class DaftarAnggotaController extends Controller
{
    public function daftaranggota(){
        $data = DaftarAnggota::all();
        return view('anggota.daftaranggota', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RusakController extends Controller
{
    public function rusak(){
        return view('bukurusak.rusak');
    }
}

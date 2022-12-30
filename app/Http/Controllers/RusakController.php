<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RusakController extends Controller
{
    public function rusaks(){
        return view('bukurusak.rusak');
    }
}

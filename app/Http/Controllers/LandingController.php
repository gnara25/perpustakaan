<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function daftarbuku(){
        return view('daftarbuku');
    }
    public function landing(){
        return view('landing');
    }
}

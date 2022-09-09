<?php

namespace App\Http\Controllers;

use App\Models\Daftarbuku;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function daftarbuku(){
        $data = Daftarbuku::all();
        return view('daftarbuku',compact('data'));
    }
    public function landing(){
        return view('landing');
    }
}

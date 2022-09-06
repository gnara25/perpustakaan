<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function Login(){
        return view('login.login');
    }
}

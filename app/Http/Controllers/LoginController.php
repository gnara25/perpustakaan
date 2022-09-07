<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function Login(){
        return view('login.login');
    }

    public function logined(Request $request){

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'password Harus Diisi'
        ]);
        if(Auth::attempt($request->only('email','password'))){
            return redirect('beranda');
         }
        //  dd($request);
         
         return redirect('loginn')->with('salah', 'Email atau Password Salah!');
    }

    public function register(){
        return view('login.register');
    }

    public function registeruser(Request $request){
        $this->validate($request,[
            'nisn' => 'required',
            'name' => 'required',
            'kelas' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
        ],[
            'nisn.required' => 'NISN Wajib Di Isi ',
            'name.required' => 'Nama Harus Di isi',
            'kelas.required' => 'Kelas Harus Di Isi',
            'email.required' => 'Email Harus Diisi',
            'email' => 'Email Yang Anda Masukan Tidak Benar',
            'unique' => 'Email Ini Suadah Digunakan',
            'password.required' => 'Password Harus Diisi',
            'password.min' => 'Password harus minimal 8 karakter',
        ]);
        
       User::create([
            'nisn' => $request->nisn,
            'name' => $request->name,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
            'remember_token' => Str::random(60),
        ]);
        // dd ($data);
        return redirect('/loginn');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

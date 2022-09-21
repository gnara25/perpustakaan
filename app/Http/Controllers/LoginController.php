<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function Login(){
        return view('masuk.login');
    }

    public function logined(Request $request){

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Harus Diisi',
            'email.inuque' => 'email sudah di pakai',
            'password.required' => 'password Harus Diisi'
        ]);
        if(Auth::attempt($request->only('email','password'))){
            return redirect('beranda');
         }
        //  dd($request);

         return redirect('login')->with('error', 'Email atau Password Salah!');
    }

    public function register(){
        return view('masuk.register');
    }

    public function registeruser(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'name' => 'required',
            'notelepon' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
        ],[
            'username.required' => 'Username Harus Di isi',
            'name.required' => 'Nama Harus Di isi',
            'notelepon.required' => 'No Telepon Harus Di Isi',
            'email.required' => 'Email Harus Diisi',
            'email' => 'Email Yang Anda Masukan Tidak Benar',
            'unique' => 'Email Ini Suadah Digunakan',
            'password.required' => 'Password Harus Diisi',
            'password.min' => 'Password harus minimal 8 karakter',
        ]);
       User::create([
            'username' => $request->username,
            'name' => $request->name,
            'notelepon' => $request->notelepon,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'petugas',
            'remember_token' => Str::random(60),
        ]);
        // dd ($data);
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    // public function profileedit(){
    //     return view('profile.editprofile');
    // }

    // public function editfoto(Request $request)
    // {
    //     $request->validate([
    //         'foto' => ['mimes:png,jpg,jpeg,gif']
    //     ]);

    //     $user = user::findOrFail(Auth::user()->id);
    //     if ($request->hasFile('foto')) {
    //         $request->file('foto')->move('fotosiswa/',$request->file('foto')->getClientOriginalName());
    //         $user->foto = $request->file('foto')->getClientOriginalName();
    //         $user->save();
    //     }

    //     return redirect()->back()->with('success','Berhasil Mengubah Foto');
    // }

    public function editprofile(Request $request){

        $request->validate([
            'username' => ['required','min:3'],
            'notelepon' => ['required','min:5'],
            'name' => ['string','min:4','required'],
            'email' => ['email', 'string','min:4','required','email:dns'],
            'foto' => ['mimes:png,jpg,jpeg,gif'],

        ],[
            'username.required' => 'Username Harus Di isi',
            'username.min' => 'Username Minimal 3 karakter',
            'name.required' => 'Nama Harus Di isi',
            'name.min' => 'Nama Minimal 4 karakter',
            'notelepon.required' => 'No Telepon Harus Di Isi',
            'notelepon.min' => 'No Telepon Minimal 4 karakter',
            'email.required' => 'Email Harus Diisi',
            'email.min' => 'Email Minimal 3 karakter',
            'email' => 'Email Yang Anda Masukan Tidak Benar',
            'unique' => 'Email Ini Suadah Digunakan',
        ]);

        $user = user::findOrFail(Auth::user()->id);
        // dd($request);
        $user -> update([
            'username' => $request->username,
            'name' => $request->name,
            'notelepon' => $request->notelepon,
            'email' => $request->email,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotosiswa/',$request->file('foto')->getClientOriginalName());
            $user->foto = $request->file('foto')->getClientOriginalName();
            $user->save();
        }
        return redirect()->back()->with('success','Profile Berhasil Di Ubah');
    }

    public function editpassword(Request $request){
        $request->validate([
           'old_password' => 'required',
           'password' => 'required|confirmed|min:8',
       ]);
       $hashpassword = Auth::user()->password;
       if (Hash::check($request->old_password,$hashpassword)){
           $user = User::findOrFail(Auth::id());
           $user->password = Hash::make($request->password);
           $user->save();
           Auth::logout();

           return redirect()->route('login')->with('success','password Berhasil Diubah');
       }else{
           return redirect()->back()->with('error','password Lama Tidak Cocok');
       }

   }



}

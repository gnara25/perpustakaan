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

    // public function profileedit(){
    //     return view('profile.editprofile');
    // }

    public function editfoto(Request $request)
    {
        $request->validate([
            'foto' => ['mimes:png,jpg,jpeg,gif']
        ]);

        $user = user::findOrFail(Auth::user()->id);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotosiswa/',$request->file('foto')->getClientOriginalName());
            $user->foto = $request->file('foto')->getClientOriginalName();
            $user->save();
        }

        return redirect()->back()->with('success','Berhasil Mengubah Foto');
    }

    public function editprofile(Request $request){

        $request->validate([
            'kelas' => ['required','min:5'],
            'nisn' => ['required','min:5,'],
            'name' => ['string','min:4','alpha_num','required'],
            'email' => ['email', 'string','min:4','required']
        ]);

        $user = user::findOrFail(Auth::user()->id);
        $user -> update([
            'name' => $request->name,
            'kelas' => $request->kelas,
            'nisn' => $request->nisn,
            'email' => $request->email
        ]);
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

           return redirect()->route('login')->with('success','Kata Sandi Berhasil Diubah');
       }else{
           return redirect()->back()->with('error','Kata Sandi Lama Tidak Cocok');
       }

   }



}

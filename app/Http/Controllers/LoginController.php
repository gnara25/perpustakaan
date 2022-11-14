<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Denda;
use App\Models\Kategori;
use App\Models\Daftarbuku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DaftarAnggota;
use App\Models\laporanpinjam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{

    public function beranda(Request $request){
       $denda = Denda::select(DB::raw("created_at, sum(denda) as denda"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();

        $previousMonths = [];

        $currentDate = now()->startOfMonth();
        while ($currentDate->year == Carbon::now()->year) {
            $previousMonths[] = $currentDate->format('F');
            $currentDate->subMonth();
        }

        $previousMonths = array_reverse($previousMonths);
        
        $array_pengeluaran = array();
        foreach($previousMonths as $key => $val){
            $array_pengeluaran[$key] = 0;
            foreach ($denda as $mp) {
                $waktu = Carbon::parse($mp->created_at)->format('F');
            
                if($val == $waktu){
                    $array_pengeluaran[$key] = $mp->denda;
                }
            }
        }  
        $buku = Daftarbuku::paginate(5);
        $bukucount = Daftarbuku::all()->count();
        $anggota = DaftarAnggota::paginate(5);
        $anggotacount = DaftarAnggota::all()->count();
        $pinjam = laporanpinjam::all()->count();
        $petugas = User::where('role','petugas')->count();
        $data = Daftarbuku::all()->sortByDesc('dipinjam');
        $idkategori = Kategori::all(); 
        return view('beranda', compact('buku','anggota','pinjam','petugas','bukucount','anggotacount', 'data', 'array_pengeluaran', 'previousMonths', 'idkategori'));
    }

    public function berandah(Request $request){
        $data = DB::table('daftarbukus') 
                    ->join('kategoris', 'daftarbukus.kategori','kategoris.id')
                    ->select('daftarbukus.*', 'kategoris.kategori')
                    ->where(['daftarbukus.kategori'=> $request->kategories])->get();
                    // ->get();
        // $query = Daftarbuku::query();
        // $datas = $query->where(['kategori'=>$request->kategories])->get();
        // $datas = $query->get();
        
        return response()->json(['data' => $data]);
    }

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
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ],[
            'username.required' => 'Username Harus Di isi',
            'name.required' => 'Nama Harus Di isi',
            'notelepon.required' => 'No Telepon Harus Di Isi',
            'email.required' => 'Email Harus Diisi',
            'email' => 'Email Yang Anda Masukan Tidak Benar',
            'unique' => 'Email Ini Sudah Digunakan',
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
        return redirect('/login')->with('success', 'Berhasil Membuat Akun');
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
            'username' => ['required'],
            'notelepon' => ['required'],
            'name' => ['required'],
            'email' => [ 'required'],
            'foto' => ['mimes:png,jpg,jpeg,gif'],

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
           

           return redirect()->back()->with('success','password Berhasil Diubah');
       }else{
           return redirect()->back()->with('error','password Lama Tidak Cocok');
       }  
   }

   public function petugas(){
    $data = User::where('role','petugas')->get();
    return view('daftar petugas.petugas', compact('data'));
   }

   public function tambahpetugas(){
    return view('daftar petugas.tambahpetugas');
   }

   public function tambahpetugaspost(Request $request){
    $this->validate($request,[
        'username' => 'required',
        'name' => 'required',
        'notelepon' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:8',
        'foto' => 'required',
    ],[
        'username.required' => 'Username Harus Di isi',
        'name.required' => 'Nama Harus Di isi',
        'notelepon.required' => 'No Telepon Harus Di Isi',
        'email.required' => 'Email Harus Diisi',
        'email' => 'Email Yang Anda Masukan Tidak Benar',
        'unique' => 'Email Ini Sudah Digunakan',
        'password.required' => 'Password Harus Diisi',
        'password.min' => 'Password harus minimal 8 karakter',
        'foto' => 'Foto Harus Diisi',
    ]);
    User::create([
        'username' => $request->username,
        'name' => $request->name,
        'notelepon' => $request->notelepon,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'petugas',
        'foto' => $request->foto,
        'remember_token' => Str::random(60),
    ]);

    return redirect()->route('petugas')->with('success', 'Data Berhasil ditambahkan');

   }
}

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
        $buku = Daftarbuku::paginate(5);
        $bukucount = Daftarbuku::all()->count();
        $dendass = Denda::select(\Illuminate\Support\Facades\DB::raw("sum(denda) as datadenda"))
                            ->get();
                        // ->pluck('datadenda');
                        // dd($dendass);
        $anggota = DaftarAnggota::paginate(5);
        $anggotacount = DaftarAnggota::all()->count();
        $pinjam = laporanpinjam::all()->count();
        $petugas = User::where('role','petugas')->count();
        $data = Daftarbuku::all()->sortByDesc('dipinjam');
        // $data = Daftarbuku::query();
        // if($request->filled('kategori')){
        //     $data->where('kategori','LIKE','%' . $request->kategori . '%');
        // }

        $idkategori = Kategori::all(); 
        $datas = Denda::all();
        $datadenda = Denda::select(\Illuminate\Support\Facades\DB::raw("count(*) as datadenda"), \Illuminate\Support\Facades\DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->orderBy('month', 'asc')
        ->groupBy(\Illuminate\Support\Facades\DB::raw("Month(created_at)"))
        ->pluck('datadenda');

        
        $bulandenda = Denda::select(\Illuminate\Support\Facades\DB::raw("MONTHNAME(created_at) as bulandenda"))
        ->groupBy(\Illuminate\Support\Facades\DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulandenda');
        
        $datadenda = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        
        foreach($datas as $d){
            $denda = $datadenda[Carbon::parse($d->created_at)->month - 1];
            
            $datadenda[Carbon::parse($d->created_at)->month-1]=$denda+$d->denda;
        }
        return view('beranda', compact('buku', 'dendass','anggota','pinjam','petugas','bukucount','anggotacount', 'data', 'idkategori', 'datas', 'datadenda', 'bulandenda'));
    }

    public function filter(Request $request){
        $year = $request->get('year');

        $daftardenda = Denda::whereYear('created_at', '=', $year)->get();

        return view('beranda', ['daftardenda' => $daftardenda]);
    }

    public function grafik(Request $request){
        $daftardenda = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $denda = Denda::whereYear('created_at', $request->tahun)->get();

        foreach ($denda as $b){
            $jumlah = $daftardenda[Carbon::parse($b->created_at)->month-1];
            $daftardenda[Carbon::parse($b->created_at)->month-1]= $jumlah + $b -> denda;
        }

        $data = [
            "denda" => $daftardenda,
        ];
        // dd($data)

        return $data;
    }

    public function berandah(Request $request){
        // dd($request);
        if($request->kategories){
            $data = \Illuminate\Support\Facades\DB::table('daftarbukus')
                        ->join('kategoris', 'daftarbukus.kategori','kategoris.id')
                        ->select('daftarbukus.*', 'kategoris.kategori')
                        ->where(['daftarbukus.kategori'=> $request->kategories])
                        ->orderBy('dipinjam', 'DESC')
                        ->get();
        }else{
            $data = \Illuminate\Support\Facades\DB::table('daftarbukus')
                        ->join('kategoris', 'daftarbukus.kategori','kategoris.id')
                        ->select('daftarbukus.*', 'kategoris.kategori')
                        ->orderBy('dipinjam', 'DESC')
                        ->get();
        }
        
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
        if(auth()->user()->role == 'user'){
               return redirect('scanner');
            } else {
                return redirect('beranda');
            }
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
            'role' => 'Petugas',
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
           'password' => 'required|confirmed|min:6',
       ]);
       $hashpassword = Auth::user()->password;
       if (Hash::check($request->old_password,$hashpassword)){
           $user = User::findOrFail(Auth::id());
           $user->password = Hash::make($request->password);
           $user->save();
           

           return redirect()->back()->with('success','password Berhasil Diubah');
       } else {
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

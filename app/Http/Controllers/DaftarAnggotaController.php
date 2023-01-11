<?php

namespace App\Http\Controllers;

use \PDF;
use App\Models\User;
use App\Models\Detailbuku;
use App\Imports\UserImport;
use App\Models\Bukukembali;
use Illuminate\Support\Str;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Models\DaftarAnggota;
use Illuminate\Support\Facades\DB;
use App\Imports\DaftarAnggotaImport;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use App\Http\Controllers\DaftarAnggotaController;

class DaftarAnggotaController extends Controller
{
    public function daftaranggota(){
        $data = DaftarAnggota::all();
        $detail = Pengembalian::all();
        return view('anggota.daftaranggota', compact('data','detail'));
    }

    public function tambahanggota(){
        return view('anggota.tambahanggota');
    }

    public function detail($id){
        // $detail = Bukukembali::all();
        $detail = Detailbuku::where('id_siswa', $id)->get();
        $data = DB::table('detailbukus')
        ->join('daftar_anggotas', 'daftar_anggotas.id', '=', 'detailbukus.id_siswa')
        ->where('detailbukus.id_siswa', $id)
        ->get();
        return view('anggota.detail',\compact('detail'))->with('data', $data);
    }
   

    public function tambahanggotapost(Request $request){
        $this->validate($request,[
            'nisn' => 'required|unique:daftar_anggotas',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'foto' => ['required','mimes:png,jpg,jpeg,gif,jfif'],
        ],[
            'nisn.required' => 'NISN Wajib Diisi',
            'nisn.unique' => 'Nisn Tidak Boleh Sama',
            'nama.required' => 'Nama Wajib Diisi',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'kelas.required' => 'Kelas Wajib Diisi',
            'jenis_kelamin.required' => 'Pilih Jenis Kelamin',
            'alamat.required' => 'Alamat Wajib Diisi',
        ]);

        $data = DaftarAnggota::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'email' => $request->email,
            'tgl_lahir' => $request->tgl_lahir,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'qr_code' => $request->nisn,
            'foto' => $request->foto,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobuku/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        User::create([
            'username' => $request->nisn,
            'name' => $request->nama,
            'notelepon' => $request->notelepon,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'petugas',
            'kelas' => 'petugas',
            'remember_token' => Str::random(60),
        ]);
        

        return redirect()->route('daftaranggota')->with('success','Data Berhasil Ditambahkan');
    }

    public function editanggotapost(Request $request, $id){
        $data = DaftarAnggota::findOrFail($id);
        $this->validate($request,[
            'nisn' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'foto' => ['mimes:png,jpg,jpeg,gif,jfif'],
        ],[
            'nisn.required' => 'NISN Wajib Diisi',
            'nisn.unique' => 'Nisn Tidak Boleh Sama',
            'nama.required' => 'Nama Wajib Diisi',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'kelas.required' => 'Kelas Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
                'foto.mimes' => 'Format yang diperbolehkan hanya png,jpeg,gif,jfif'
        ]);
        $data->update([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobuku/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('daftaranggota')->with('success','Data Berhasil Diubah');
    }


    public function deleteanggota($id)
    {

        $data = DaftarAnggota::find($id);
        $data->delete();
        return redirect()->route('daftaranggota')->with('success', 'Data Berhasil di Hapus');
    }

    public function detailanggota($id){
        $title = ' Detail Anggota';
        $data = DaftarAnggota::find($id);

        return view('anggota.detailanggota', compact('title', 'data'));
    }
    
    public function cetakidcard(Request $request){
      
        $dataanggota = array();
        foreach ($request->id as $id) {
            $anggota = DaftarAnggota::find($id);
            $dataanggota[] = $anggota;
        }
        $no  = 1;
        $pdf = PDF::loadView('anggota.idcard', compact('dataanggota','no',));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('idcard.pdf');

    }
    public function importexcel(Request $request) 
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa',$nama_file);
 
        // import data
        Excel::import(new DaftarAnggotaImport, public_path('/file_siswa/'.$nama_file));
        Excel::import(new UserImport, public_path('/file_siswa/'.$nama_file));
 
        // alihkan halaman kembali
        return redirect()->back()->with('success','Data Siswa Berhasil Diimport!');
    }
    
}

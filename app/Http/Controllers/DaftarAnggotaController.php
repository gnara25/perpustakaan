<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarAnggota;
use App\Http\Controllers\DaftarAnggotaController;

class DaftarAnggotaController extends Controller
{
    public function daftaranggota(){
        $data = DaftarAnggota::all();
        return view('anggota.daftaranggota', compact('data'));
    }

    public function tambahanggota(){
        return view('anggota.tambahanggota');
    }

    public function tambahanggotapost(Request $request){
        $this->validate($request,[
            'nisn' => 'required|unique:daftar_anggotas',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ],[
            'nisn.required' => 'NISN Wajib Diisi',
            'nisn.unique' => 'Nisn Tidak Boleh Sama',
            'nama.required' => 'Nama Wajib Diisi',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'kelas.required' => 'Kelas Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
        ]);
        $data = DaftarAnggota::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('daftaranggota')->with('success','Data Berhasil Ditambahkan');
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
}

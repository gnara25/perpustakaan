<?php

namespace App\Http\Controllers;

use \PDF;
use Illuminate\Support\Str;
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
    public function idcard ($id){
        $data = DaftarAnggota::findOrFail($id);
        return view('anggota.idcard', compact('data'));
    }

    public function tambahanggotapost(Request $request){
        $this->validate($request,[
            'nisn' => 'required|unique:daftar_anggotas',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'foto' => ['required','mimes:png,jpg,jpeg,gif,jfif'],
        ],[
            'nisn.required' => 'NISN Wajib Diisi',
            'nisn.unique' => 'Nisn Tidak Boleh Sama',
            'nama.required' => 'Nama Wajib Diisi',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'kelas.required' => 'Kelas Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
        ]);

        $qr_code = Str :: random(20);

        $data = DaftarAnggota::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'qr_code' => $qr_code,
            'foto' => $request->foto,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobuku/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
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
        
        // return $databuku;
        $pdf = PDF::loadView('anggota.idcard', compact('anggota'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('idcard.pdf');
    }
    
}

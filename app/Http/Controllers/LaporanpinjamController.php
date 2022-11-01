<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\laporanpinjam;
use App\Models\Peminjaman;
use App\Models\Detailbuku;

class LaporanpinjamController extends Controller
{
    public function laporanpinjam (){
        $data = laporanpinjam::all();
        $pinjam = peminjaman::all();
        $id = 1;
        $details = DB::table('detailbukus')
                  // ->form()  
                  ->join('laporanpinjams','laporanpinjams.id','=','detailbukus.id_transaksi','left') 
                  ->where('laporanpinjams.id', $id) 
                  ->get();
        return view('laporan.peminjaman', compact('data','pinjam'))->with('details',$details);
    }
    public function detailpinjam($id){
    $detail= detailbuku::where('id_transaksi', $id)->get();
    return response()->json([
        'datas' => $detail
    ]);
}
}

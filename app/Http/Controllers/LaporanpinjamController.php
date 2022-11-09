<?php

namespace App\Http\Controllers;

use DB;
use \PDF;
use App\Exports\LaporanpinjamExport;
use Maatwebsite\Excel\Facades\Excel;
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
    $detail= Detailbuku::where('id_transaksi', $id)->get();
    return response()->json([
        'datas' => $detail
    ]);
}

public function modalBuk($id){
    $detail= Detailbuku::where('id_transaksi', $id)->get();
    return response()->json([
        'data' => $detail
    ]);
}

public function detailbuku($id){
    $detail = Detailbuku::where('id_transaksi', $id)->get();
    $data = DB::table('peminjamen')
    ->join('detailbukus', 'detailbukus.id_transaksi', '=', 'peminjamen.id')
    ->where('peminjamen.id', $id)
    ->get();

    // return view('peminjaman.detailbuku')->with('data', $data);
    return view('peminjaman.detailbuku', compact('detail'))->with('data', $data);
}

public function cetaklaporan()
    {
        $data = laporanpinjam::all();
 
        $pdf = PDF::loadview('laporan.laporanpinjampdf', ['data' => $data]);
        return $pdf->download('laporan-peminjaman.pdf');
    }

 public function export_excel()
    {
        return Excel::download(new LaporanpinjamExport, 'laporan_peminjaman.xlsx');
    }   



}

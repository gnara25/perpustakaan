<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;
use DB;
use App\Models\Bukukembali;

class DendaController extends Controller
{
    
    public function denda (){
        $data = Denda::with('peminjaman.anggota')->get();
        $id = 1;
        $details = DB::table('bukukembalis')
                  // ->form()  
                  ->join('dendas','dendas.id','=','bukukembalis.id_denda','left') 
                  ->where('dendas.id', $id) 
                  ->get();
        return view('laporan.denda', compact('data'))->with('details',$details);
    }
    public function pendapatan(){
          $harga = Denda::select(
                            DB::raw("(sum(denda)) as denda"),
                            DB::raw("(DATE_FORMAT(created_at, '%M')) as month"),
                            DB::raw("(DATE_FORMAT(created_at, '%Y')) as year")
                            )
                            ->orderBy('created_at')
                            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M')"))
                            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y')"))
                            ->get();

            

        return view('laporan.pendapatan',compact('harga'));                    
    }

     public function detaildenda($id){
        $details = Bukukembali::where('id_denda', $id)->get();
        return response()->json([
            'datas' => $details
        ]);
    }

   
}
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
        
        // $denda = Denda::select(DB::raw("sum(denda) as denda"))
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy(DB::raw("MONTH(created_at)"))
        //     ->get();

        // $previousMonths = [];

        // $currentDate = now()->startOfMonth();
        // while ($currentDate->year == Carbon::now()->year) {
        //     $previousMonths[] = $currentDate->format('M, Y');
        //     $currentDate->subMonth();
        // }

        // $previousMonths = array_reverse($previousMonths);
        
        // $array_pengeluaran = array();
        // foreach($previousMonths as $key => $val){
        //     $array_pengeluaran[$key] = 0;
        //     foreach ($denda as $mp) {
        //         $waktu = Carbon::parse($mp->created_at)->format('M, Y');
            
        //         if($val == $waktu){
        //             $array_pengeluaran[$key] = $mp->denda;
        //         }
        //     }
        // }    
        $total_denda = Denda::select(DB::raw("(sum(denda)) as denda"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(\DB::raw("Month(created_at)"))
                            ->pluck('denda');                
        $bulan = Denda::select(DB::raw("MONTHNAME(created_at) as bulan"))
                            ->groupBy(\DB::raw("MONTHNAME(created_at)"))
                            ->pluck('bulan');
        $harga = Denda::select(
                            DB::raw("(sum(denda)) as denda"),
                            DB::raw("(DATE_FORMAT(created_at, '%M')) as month"),
                            DB::raw("(DATE_FORMAT(created_at, '%Y')) as year")
                            )
                            ->orderBy('created_at')
                            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M')"))
                            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y')"))
                            ->get();
        return view('laporan.pendapatan',compact('harga','total_denda','bulan'));                    
    }

     public function detaildenda($id){
        $details = Bukukembali::where('id_denda', $id)->get();
        return response()->json([
            'datas' => $details
        ]);
    }

    

   
}
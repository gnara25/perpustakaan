<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
                  ->join('dendas',  'dendas.id','=','bukukembalis.id_denda','left') 
                  ->where('dendas.id', $id) 
                  ->get();
        return view('laporan.denda', compact('data'))->with('details',$details);
    }

    public function pendapatan(){
        $data = Denda::all();
        $harga = Denda::select(
            DB::raw("(sum(denda)) as denda"),
            DB::raw("(DATE_FORMAT(created_at, '%M')) as month"),
            DB::raw("(DATE_FORMAT(created_at, '%Y')) as year")
            )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M')"))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y')"))
            ->get();

        $datadenda = Denda::select(DB::raw("count(*) as datadenda"), DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->orderBy('month', 'asc')
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('datadenda');

        
        $bulandenda = Denda::select(DB::raw("MONTHNAME(created_at) as bulandenda"))
        ->groupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulandenda');
        
        $datadenda = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        
        foreach($data as $d){
            $denda = $datadenda[Carbon::parse($d->created_at)->month - 1];
            
            $datadenda[Carbon::parse($d->created_at)->month-1]=$denda+$d->denda;
        }
        // dd($datadenda);
        
        // dd($datadenda);
        return view('laporan.pendapatan', compact('data', 'datadenda', 'bulandenda', 'harga'));
        
    }

    public function filter(Request $request){
        $year = $request->get('year');

        $daftardenda = Denda::whereYear('created_at', '=', $year)->get();

        return view('laporan.denda', ['daftardenda' => $daftardenda]);
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

    public function detaildenda($id){
        $details = Bukukembali::where('id_denda', $id)->get();
        return response()->json([
            'datas' => $details
        ]);
    }

}
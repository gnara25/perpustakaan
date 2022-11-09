<?php

namespace App\Exports;

use App\Models\laporanpinjam;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanpinjamExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return laporanpinjam::all();
    }
}

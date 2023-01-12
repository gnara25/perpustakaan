<?php

namespace App\Imports;

use App\Models\Daftarbuku;
use Maatwebsite\Excel\Concerns\ToModel;

class DaftarbukuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row[4]);
        return new Daftarbuku([
            'kodebuku' => $row[1],
            'namabuku' => $row[2],
            'pengarang' => $row[3],
            'bukudatang' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1])->format('Y-m-d'),
            'jumlah' => $row[5],
            'rusak' => '0',
            'lokasibuku' => $row[6],
            'dipinjam' => '0',
            'status' => 'tersedia',
            'foto' => $row[7],
        ]);
    }
}

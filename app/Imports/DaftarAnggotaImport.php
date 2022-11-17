<?php

namespace App\Imports;

use App\Models\DaftarAnggota;
use Maatwebsite\Excel\Concerns\ToModel;

class DaftarAnggotaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DaftarAnggota([
             'nisn' => $row[1],
            'nama' => $row[2], 
            'jenis_kelamin' => $row[3],
            'tgl_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4])->format('Y-m-d'),
            'kelas' => $row[5],
            'alamat' => $row[6],
            'qr_code' => $row[7],
            'foto' => $row[8], 
        ]);
    }
}

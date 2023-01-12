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
        return new Daftarbuku([
            'kodebuku' => $row[1],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row[5]);
        return new User([
            'kelas' => $row[5],
            'username' => $row[1],
            'name' => $row[2], 
            'notelepon' => $row[10],
            'role' => 'user',
            'foto' => $row[8],
            'email' => $row[9],
            'password' => bcrypt($row[1]),
        ]);
    }
}

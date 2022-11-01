<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukukembali extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at'];

    public function kembali()
    {
        return $this->belongsTo(Pengembalian::class , 'id_transaksi');
    }

    use HasFactory;
}

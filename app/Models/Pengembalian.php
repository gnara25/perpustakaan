<?php

namespace App\Models;

use App\Models\Pengembalian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengembalian extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];

    public function idpengembalian()
    {
        return $this->belongsTo(DaftarAnggota::class,'nama','id');
    }
}



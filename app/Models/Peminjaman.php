<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];
     public function anggota()
    {
        return $this->belongsTo(DaftarAnggota::class,'nama','id','kelas');
    }
    public function idbuku()
    {
        return $this->belongsTo(Daftarbuku::class,'nama','id');
    }
}

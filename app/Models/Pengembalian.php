<?php

namespace App\Models;

// use App\Models\Pengembalian;
// use App\Models\Daftarbuku;
use App\Models\Peminjaman;
use App\Models\Bukukembali;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengembalian extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];

    public function idpengembalian()
    {
        return $this->belongsTo(Daftarbuku::class,'kodebuku','id');
    }
    public function idtransaksi()
    {
        return $this->belongsTo(Peminjaman::class,'transaksi','id');

    }
    public function kembaliid()
    {
        return $this->hasMany(Bukukembali::class, 'id');
    }
}



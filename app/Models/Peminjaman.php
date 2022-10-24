<?php

namespace App\Models;

use App\Models\Pengembalian;
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
        return $this->belongsTo(Daftarbuku::class,'kodebuku','id');
    }
    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
    public function denda()
    {
        return $this->hasMany(Denda::class);
    }
    public function detailid()
    {
        return $this->hasMany(Detailbuku::class, 'id');
    }
    
}

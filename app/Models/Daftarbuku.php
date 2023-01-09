<?php

namespace App\Models;


// use App\Models\Daftarbuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daftarbuku extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at'];

    public function idkategori()
    {
        return $this->belongsTo(Kategori::class,'kategori','id');
    }
    public function idbuku()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function idbukus()
    {
        return $this->hasMany(Rusak::class);
    }


    public function detail_buku($id){
        $data = Daftarbuku::where('id',$id)->first();
        return $data;
    }
}

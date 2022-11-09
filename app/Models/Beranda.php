<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];

    // public function idkategori()
    // {
    //     return $this->belongsTo(Kategori::class,'kategori','id');
    // }
}

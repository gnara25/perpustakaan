<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarbuku extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $guarded = [];
    protected $dates = ['created_at'];

    public function idkategori()
    {
        return $this->belongsTo(Kategori::class,'kategori','id');
    }
=======

    protected $guarded = [];
    protected $dates = ['created_at'];
>>>>>>> 3bb288a1d0fcb2b7cc327e327b2d22e1b7d8c5d9
}


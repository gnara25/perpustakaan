<?php

namespace App\Models;

use App\Models\Kategori;
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
}

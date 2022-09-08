<?php

namespace App\Models;

use App\Models\Daftarbuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];

    public function idkategori()
    {
        return $this->hasMany(Daftarbuku::class);
    }

}

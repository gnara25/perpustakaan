<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailbuku extends Model
{

    protected $guarded = [];
    protected $dates = ['created_at'];

    public function detail()
    {
        return $this->hasMany(Peminjaman::class, 'id');
    }


    use HasFactory;
}

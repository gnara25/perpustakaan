<?php

namespace App\Models;

use App\Models\DaftarAnggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarAnggota extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];
}

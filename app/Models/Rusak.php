<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rusak extends Model
{
    use HasFactory;

     protected $guarded = [];
    protected $dates = ['created_at'];

      public function idbukus()
    {
        return $this->belongsTo(Daftarbuku::class,'kodebuku','id');
    }
}

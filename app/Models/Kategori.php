<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $guarded = [];
    protected $dates = ['created_at'];

    public function kategori()
    {
        return $this->hasMany(Daftarbuku::class);
    }

=======

    protected $guarded = [];
    protected $dates = ['created_at'];
>>>>>>> 3bb288a1d0fcb2b7cc327e327b2d22e1b7d8c5d9
}

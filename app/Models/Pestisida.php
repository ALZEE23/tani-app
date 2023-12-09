<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pestisida extends Model
{
    use HasFactory;

    protected $fillable = [
        'opt',
        'bahan_aktif',
        'produk'
    ];

}


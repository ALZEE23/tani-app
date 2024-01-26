<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alsintan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kecamatan',
        'desa',
        'subsektor',
        'gapoktan',
        'ketua_gapoktan',
        'kontak',
        'alat',
        'jumlah_alat',
        'tahun'
    ];
}

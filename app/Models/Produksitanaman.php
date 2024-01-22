<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksitanaman extends Model
{
    use HasFactory;
    public $table = "produksitanamans";
    protected $fillable = [
        'desa',
        'tanam',
        'panen',
        'gagal_panen',
        'produksi',
        'provitas',
        'tanggal',
        'kecamatan',
        'komoditas',
        'subsektor',
        'komoditas2',
    ];
}

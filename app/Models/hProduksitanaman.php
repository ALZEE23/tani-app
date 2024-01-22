<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hProduksitanaman extends Model
{
    use HasFactory;
    public $table = "hproduksitanamans";
    protected $fillable = [
        'sebelum_desa',
        'sebelum_tanam',
        'sebelum_panen',
        'sebelum_gagal_panen',
        'sebelum_produksi',
        'sebelum_provitas',
        'tanggal',
        'sebelum_kecamatan',
        'sebelum_komoditas',
        'komoditas2',
    ];
}

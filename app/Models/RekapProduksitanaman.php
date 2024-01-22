<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapProduksitanaman extends Model
{
    use HasFactory;
    public $table = "rekap_produksitanamans";
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

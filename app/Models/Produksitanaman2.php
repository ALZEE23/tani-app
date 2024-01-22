<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksitanaman2 extends Model
{
    use HasFactory;
    public $table = "produksitanaman";
    protected $fillable = [
        'desa',
        'kecamatan',
        'subsektor',
        'komoditas',
        'tanggal',
        'tanam_bulan_lalu',
        'tanam_bulan_sekarang',
        'panen_bulan_terakhir',
        'panen_dari_data_tanam_yang_bulan',
        'panen_bulan_sekarang',
        'gagal_panen_bulan_terakhir',
        'gagal_panen_terakhir_dari_bulan',
        'gagal_panen_bulan_sekarang',
        'produksi_bulan_terakhir',
        'produksi_bulan_sekarang',
    ];
}

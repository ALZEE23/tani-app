<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hProduksipeternakan extends Model
{
    use HasFactory;
    public $table = "hproduksipeternakans";
    public $fillable = [
        'sebelum_desa',
        'sebelum_jumlah_ternak',
        'sebelum_jumlah_kandang',
        'tanggal',
        'sebelum_kecamatan',
        'sebelum_jenis_ternak',
    ];
}

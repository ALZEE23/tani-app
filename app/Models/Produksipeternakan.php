<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksipeternakan extends Model
{
    use HasFactory;
    public $table = "produksipeternakans";
    public $fillable = [
        'desa',
        'jumlah_ternak',
        'jumlah_kandang',
        'tanggal',
        'kecamatan',
        'jenis_ternak',
    ];
}

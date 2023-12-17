<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;
    public $fillable = ['tahun','bulan','desa','kecamatan','tanggal','foto','keterangan'];
    public $timestamps = false; 
}

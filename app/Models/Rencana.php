<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencana extends Model
{
    use HasFactory;
    public $fillable = ['tanggal','rencana_kegiatan','tahun','bulan','penyuluh','desa','kecamatan'];
    public $timestamps = false; 
}

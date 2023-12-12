<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyuluhan extends Model
{
    use HasFactory;

    public $fillable = ['tanggal','rencana_kegiatan','penyuluh','desa'];
    public $timestamps = false;
}

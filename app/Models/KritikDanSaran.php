<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KritikDanSaran extends Model
{
    use HasFactory;

    public $table = 'KritikDanSaran';
    public $fillable = ['tanggal', 'KritikDanSaran','kecamatan','desa'];
    public $timestamps = false;
}

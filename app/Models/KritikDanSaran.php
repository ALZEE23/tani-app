<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KritikDanSaran extends Model
{
    use HasFactory;

    public $fillable = ['tanggal','KritikDanSaran'];
    public $timestamps = false;
}

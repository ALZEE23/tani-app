<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gakpoktans extends Model
{
    use HasFactory;
    public $timestamps = false;
    public  $fillable = ['desa', 'nama_gakpoktan', 'nama_ketua', 'pangan', 'berkebunan', 'hortikultura', 'peternakan', 'perikanan', 'kwt', 'no_telepopn'];
}

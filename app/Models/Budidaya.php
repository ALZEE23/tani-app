<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budidaya extends Model
{
    use HasFactory;
    protected $fillable =[
        'judul',
        'cover',
        'file',
        'kategori',
    ];
}

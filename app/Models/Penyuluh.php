<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyuluh extends Model
{
    use HasFactory;

    protected $fillable = ['nama','jabatan','wilayah','no_telepon','foto','file_rktp','file_program_desa'];
}

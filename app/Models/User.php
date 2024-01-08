<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'desa',
        'kabupaten',
        'propinsi',
        'tahun',
        'email',
        'password',
        'role',
        'kecamatan',
        'rencana_mt1',
        'rencana_mt2',
        'rencana_mt3',
        'username',
        'poktan',
        'no_telepon',
        'nama_penyuluh',
        'kode_desa',
        'kode_kios_pengecer',
        'nama_kios_pengecer',
        'poktan',
        'nama_petani',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ibu',
        'alamat',
        'subsektor',
        'komoditas_mt1',
        'luas_lahan_mt1',
        'pupuk_urea_mt1',
        'pupuk_npk_mt1',
        'pupuk_npk_formula_mt1',
        'komoditas_mt2',
        'luas_lahan_mt2',
        'pupuk_urea_mt2',
        'pupuk_npk_mt2',
        'pupuk_npk_formula_mt2',
        'komoditas_mt3',
        'luas_lahan_mt3',
        'pupuk_urea_mt3',
        'pupuk_npk_mt3',
        'pupuk_npk_formula_mt3',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isPetani(): bool
    {
        return $this->role === 'petani';
    }

    public function isPetugas(): bool
    {
        return $this->role === 'petugas';
    }

    public function isDinas(): bool
    {
        return $this->role === 'Dinas';
    }

    // Dalam proses otentikasi atau pengelolaan login
public function login(Request $request)
{
    // Lakukan proses otentikasi

    // Ambil informasi kecamatan dari formulir login
    $kecamatan = $request->input('kecamatan');

    // Simpan nilai kecamatan ke sesi atau kolom user di database
    session(['kecamatan' => $kecamatan]);
    // atau
    // Auth::user()->update(['kecamatan' => $kecamatan]);

    // Redirect ke halaman profil atau halaman beranda
    return redirect('/profile');
}

}



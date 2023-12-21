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
        'email',
        'password',
        'role',
        'nik',
        'kecamatan',
        'username',
        'poktan',
        'no_telepon',
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



<?php

namespace App\Imports;

use App\Models\User;
use App\Models\DaftarAnggotaPoktan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $nik = str_replace("'", "", $row[7]);
        $user =  new User([
            'nama_penyuluh' => $row[0],
            'kode_desa' => $row[1],
            'kode_kios_pengecer' => $row[2],
            'nama_kios_pengecer' => $row[3],
            'poktan' => $row[5],
            'nama_petani' => $row[6],
            'nik' => $nik,
            'tempat_lahir' => $row[8],
            'tanggal_lahir' => $row[9],
            'nama_ibu' => $row[10],
            'alamat' => $row[11],
            'subsektor' => $row[12],
            'komoditas_mt1' => $row[13],
            'luas_lahan_mt1' => $row[14],
            'pupuk_urea_mt1' => $row[15],
            'pupuk_npk_mt1' => $row[16],
            'pupuk_npk_formula_mt1' => $row[17],
            'komoditas_mt2' => $row[18],
            'luas_lahan_mt2' => $row[19],
            'pupuk_urea_mt2' => $row[20],
            'pupuk_npk_mt2' => $row[21],
            'pupuk_npk_formula_mt2' => $row[22],
            'komoditas_mt3' => $row[23],
            'luas_lahan_mt3' => $row[24],
            'pupuk_urea_mt3' => $row[25],
            'pupuk_npk_mt3' => $row[26],
            'pupuk_npk_formula_mt3' => $row[27],
            'password' => '$2y$12$vEP25zXn6sWxrnDWGox44uxOElA3Ida8ngLqQOoK54UwRi7irfAXW',
            'username' => $nik,
            'name' => $row[6],
            'role' => 'petani',
        ]);
        $user->save();

        $poktan = new DaftarAnggotaPoktan();
        $poktan->desa = $row[1];
        $poktan->poktan = $row[5];
        $poktan->nik = $nik;
        $poktan->nama = $row[6];
        $poktan->status = "Anggota";
        $poktan->user_id = $nik;
        $poktan->save();
    }

    public function startRow(): int
    {
        return 2; // Mulai membaca dari baris kedua (row 2)
    }
}

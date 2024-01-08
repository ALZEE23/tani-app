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
        if ($this->isHeaderRow($row)) {
            return null; // Melewati baris pertama
        }

        $user =  new User([
            'tahun' => $row[1],
            'propinsi' => $row[2],
            'kabupaten' => $row[3],
            'kecamatan' => $row[4],
            'desa' => $row[5],
            'nama_penyuluh' => $row[6],
            'nik' => $row[7],
            'name' => $row[8],
            'alamat' => $row[9],
            'nama_ibu' => $row[10],
            'tempat_lahir' => $row[11],
            'tanggal_lahir' => $row[12],
            'kode_kios_pengecer' => $row[13],
            'nama_kios_pengecer' => $row[14],
            'subsektor' => $row[15],
            'rencana_mt1' => $row[16],
            'rencana_mt2' => $row[17],
            'rencana_mt3' => $row[18],
            'komoditas_mt1' => $row[19],
            'komoditas_mt2' => $row[20],
            'komoditas_mt3' => $row[21],
            'pupuk_urea_mt1' => $row[22],
            'pupuk_urea_mt2' => $row[23],
            'pupuk_urea_mt3' => $row[24],
            'pupuk_npk_mt1' => $row[25],
            'pupuk_npk_mt2' => $row[26],
            'pupuk_npk_mt3' => $row[27],
            'pupuk_npk_formula_mt1' => $row[28],
            'pupuk_npk_formula_mt2' => $row[29],
            'pupuk_npk_formula_mt3' => $row[30],
            'password' => '$2y$12$vEP25zXn6sWxrnDWGox44uxOElA3Ida8ngLqQOoK54UwRi7irfAXW',
            'username' => $row[7],
            'name' => $row[8],
            'role' => 'petani',
        ]);
        $user->save();

        // $poktan = new DaftarAnggotaPoktan();
        // $poktan->desa = $row[1];
        // $poktan->poktan = $row[5];
        // $poktan->nik = $row[7];
        // $poktan->nama = $row[6];
        // $poktan->status = "Anggota";
        // $poktan->user_id = $row[7];
        // $poktan->save();
    }

    public function startRow(): int
    {
        return 2; // Mulai membaca dari baris kedua (row 2)
    }

    private function isHeaderRow(array $row)
    {
        // Tentukan kriteria untuk menentukan baris judul kolom
        // Sesuaikan dengan struktur data pada file Excel Anda
        // Contoh: jika kolom pertama berisi 'Nama' atau 'ID'
        return ($row[5] == 'Penyuluh'|| $row[0] == null || $row[0] == 'Data ealokasi' || $row[1] == 'Tahun') ;
    }
}

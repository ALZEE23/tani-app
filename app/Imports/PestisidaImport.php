<?php

namespace App\Imports;

use App\Models\Pestisida;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PestisidaImport implements ToModel
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
        $pestisida =  new Pestisida([
            'opt' => $row[4],
            'bahan_aktif' => $row[0],
            'kelompok' => $row[2],
            'produk' => $row[1],
            'komoditas' => $row[3],
        ]);
        $pestisida->save();
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
        return ($row[1] == 'Bahan Aktif' || $row[0] == null);

    }
}

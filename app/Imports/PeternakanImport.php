<?php

namespace App\Imports;

use App\Models\Desa;
use App\Models\Produksipeternakan;
use App\Models\hProduksipeternakan;
use App\Models\RekapProduksipeternakan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PeternakanImport implements ToModel
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
        $bulan = date('m', strtotime($row[4])); // Mengambil bulan dari tanggal

        $desa = Desa::where('desa', $row[1])->first();

        $data = Produksipeternakan::where('desa', $row[1])
            ->where('jenis_ternak', $row[5])
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();
        $data2 = hProduksipeternakan::where('sebelum_desa', $desa->desa)
            ->where('sebelum_jenis_ternak', $row[5])
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();
        if ($data2 == null) {
            $data2 = new hProduksipeternakan([
                'sebelum_desa' => $row[1],
                'sebelum_jumlah_ternak' => $row[2],
                'sebelum_jumlah_kandang' => $row[3],
                'tanggal' => $row[4],
                'sebelum_kecamatan' => auth()->user()->kecamatan,
                'sebelum_jenis_ternak' => $row[5],

            ]);
            $data2->save();
        } else {
            $data2->sebelum_jumlah_ternak = $data2->sebelum_jumlah_ternak + $row[2];
            $data2->sebelum_jumlah_kandang = $data2->sebelum_jumlah_kandang + $row[3];
            $data2->save();
        }
        if ($data == null) {
            $data = new Produksipeternakan([
                'desa' => $row[1],
                'jumlah_ternak' => $row[2],
                'jumlah_kandang' => $row[3],
                'tanggal' => $row[4],
                'kecamatan' => auth()->user()->kecamatan,
                'jenis_ternak' => $row[5],

            ]);
            $data->save();
        } else {
            $data->jumlah_ternak = $data->jumlah_ternak + $row[2];
            $data->jumlah_kandang = $data->jumlah_kandang + $row[3];
            $data->save();
        }



        // Melakukan pencarian data berdasarkan bulan dari tanggal
        $rekap = RekapProduksipeternakan::where('kecamatan', $desa->kecamatan)
            ->where('jenis_ternak', $row[5])
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();

        if ($rekap == null) {
            $rekap = new RekapProduksipeternakan([
                'kecamatan' => $desa->kecamatan,
                'jenis_ternak' => $row[5],
                'jumlah_ternak' => $row[2],
                'jumlah_kandang' => $row[3],
                'tanggal' => $row[4],
            ]);
            $rekap->save();
        } else {
            $rekap->jumlah_ternak = $rekap->jumlah_ternak + $row[2];
            $rekap->jumlah_kandang = $rekap->jumlah_kandang + $row[3];
            $rekap->save();
        }
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
        return ($row[1] == 'Desa'|| $row[0] == null) ;
    }
}

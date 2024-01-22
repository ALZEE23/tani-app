<?php

namespace App\Imports;

use App\Models\Desa;
use App\Models\Produksitanaman;
use App\Models\hProduksitanaman;

use App\Models\RekapProduksitanaman;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TanamanImport implements ToModel
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
        $bulan = date('m', strtotime($row[8])); // Mengambil bulan dari tanggal

        $desa = Desa::where('desa', $row[1])->first();


        // ////////////////////////////////////////
        $data = ProduksiTanaman::where('desa', $desa->desa)
        ->where('komoditas2', $row[10])
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();
        $data2 = hProduksiTanaman::where('sebelum_desa', $desa->desa)
        ->where('komoditas2', $row[10])
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();
        if ($data2 == null) {
            $data2 = new hProduksiTanaman([
            'sebelum_desa' => $row[1],
            'sebelum_tanam' => $row[2],
            'sebelum_panen' => $row[3],
            'sebelum_gagal_panen' => $row[4],
            'sebelum_produksi' => $row[5],
            'sebelum_provitas' => $row[6],
            'tanggal' => $row[8],
            'sebelum_kecamatan' => auth()->user()->kecamatan,
            'sebelum_komoditas' => $row[9],
            'komoditas2' => $row[10],
            ]);
            $data2->save();
        }else{
            $data2->sebelum_tanam = $row[2];
            $data2->sebelum_panen = $row[3];
            $data2->sebelum_gagal_panen = $row[4];
            $data2->sebelum_produksi = $row[5];
            $data2->sebelum_provitas = $row[6];
            $data2->save();
        }

        if($data == null){
            $data = new ProduksiTanaman([
            'desa' => $row[1],
            'tanam' => $row[2],
            'panen' => $row[3],
            'gagal_panen' => $row[4],
            'produksi' => $row[5],
            'provitas' => $row[6],
            'tanggal' => $row[8],
            'kecamatan' => auth()->user()->kecamatan,
            'komoditas' => $row[9],
            'komoditas2' => $row[10],
            ]);
            $data->save();
        }else{
            $data->tanam = $row[2];
            $data->panen = $row[3];
            $data->gagal_panen = $row[4];
            $data->produksi = $row[5];
            $data->provitas = $row[6];
            $data->save();
        }

        // Melakukan pencarian data berdasarkan bulan dari tanggal
        $rekap = RekapProduksiTanaman::where('kecamatan', $desa->kecamatan)
            ->where('komoditas', $row[9])
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();
        
        if ($rekap == null) {
            $rekap = new RekapProduksiTanaman([
            'kecamatan' =>auth()->user()->kecamatan,
            'tanam' => $row[2],
            'panen' => $row[3],
            'gagal_panen' => $row[4],
            'produksi' => $row[5],
            'provitas' => $row[6],
            'tanggal' => $row[8],
            'komoditas' => $row[9],
            'komoditas2' => $row[10],
            
            ]);
            $rekap->save();
        }else{
            $rekap->tanam = $rekap->tanam + $row[2];
            $rekap->panen = $rekap->panen + $row[3];
            $rekap->gagal_panen = $rekap->gagal_panen + $row[4];
            $rekap->produksi = $rekap->produksi + $row[5];
            $rekap->provitas = $rekap->provitas + $row[6];
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

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Alsintan;

class AlsintanExport implements FromCollection, WithHeadings, WithChunkReading, WithMapping
{
   private $rowNumber = 0;
    public function __construct()
    {
        $this->rowNumber = 0;
    }
    public function collection()
    {
<<<<<<< HEAD
        return Alsintan::all();
=======
        return \App\Models\Alsintan::all();
>>>>>>> 1a4823e95d604aeccd66bd51aed28c18bfb057ed
    }
    public function headings(): array
    {
        return [
            'No',
            'Kecamatan',
            'Desa',
            'Subsektor',
            'Gapoktan',
            'Ketua Gapoktan',
            'No Telepon',
            'Jenis Alat',
<<<<<<< HEAD
            'Jumlah',
            'Tahun Terbit',
=======
            'Jumlah alat',
            'tahun',
            'poktan',
>>>>>>> 1a4823e95d604aeccd66bd51aed28c18bfb057ed
            // Tambahkan kolom lainnya sesuai kebutuhan
        ];
    }

    public function map($alsintan): array
    {
        return [
            ++$this->rowNumber,
<<<<<<< HEAD
            $alsintan->kecamatan,
            $alsintan->desa,
            $alsintan->subsektor,
            $alsintan->gapoktan,
            $alsintan->ketua_gapoktan,
            $alsintan->kontak,
            $alsintan->alat,
            $alsintan->jumlah_alat,
            $alsintan->tahun,
=======
            $gakpoktan->desa,
            $gakpoktan->kecamatan,
            $gakpoktan->subsektor,
            $gakpoktan->nama_gakpotans,
            $gakpoktan->nama_ketua,
            $gakpoktan->kontak,
            $gakpoktan->alat,
            $gakpoktan->jumlah_alat,
            $gakpoktan->tahun,
            $gakpoktan->poktan,
>>>>>>> 1a4823e95d604aeccd66bd51aed28c18bfb057ed
            // Mapping kolom lainnya sesuai kebutuhan
        ];
    }
    public function chunkSize(): int
    {
        return 1000; // Sesuaikan dengan ukuran chunk yang Anda inginkan
    }
}

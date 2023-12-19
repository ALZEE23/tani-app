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
        return \App\Models\Alsintan::all();
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
            'Jumlah alat',
            'tahun',
            'poktan',
            // Tambahkan kolom lainnya sesuai kebutuhan
        ];
    }

    public function map($gakpoktan): array
    {
        return [
            ++$this->rowNumber,
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
            // Mapping kolom lainnya sesuai kebutuhan
        ];
    }
    public function chunkSize(): int
    {
        return 1000; // Sesuaikan dengan ukuran chunk yang Anda inginkan
    }
}

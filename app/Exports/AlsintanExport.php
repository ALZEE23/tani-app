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
        return Alsintan::all();
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
            'Jumlah',
            'Tahun Terbit',
            // Tambahkan kolom lainnya sesuai kebutuhan
        ];
    }

    public function map($alsintan): array
    {
        return [
            ++$this->rowNumber,
            $alsintan->kecamatan,
            $alsintan->desa,
            $alsintan->subsektor,
            $alsintan->gapoktan,
            $alsintan->ketua_gapoktan,
            $alsintan->kontak,
            $alsintan->alat,
            $alsintan->jumlah_alat,
            $alsintan->tahun,
            // Mapping kolom lainnya sesuai kebutuhan
        ];
    }
    public function chunkSize(): int
    {
        return 1000; // Sesuaikan dengan ukuran chunk yang Anda inginkan
    }
}

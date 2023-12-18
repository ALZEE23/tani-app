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
        return Gakpoktans::all();
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
            '',
            'Kwt',
            'No Telepon',
            // Tambahkan kolom lainnya sesuai kebutuhan
        ];
    }

    public function map($gakpoktan): array
    {
        return [
            ++$this->rowNumber,
            $gakpoktan->desa,
            $gakpoktan->nama_gakpotans,
            $gakpoktan->nama_ketua,
            $gakpoktan->pangan,
            $gakpoktan->berkebunan,
            $gakpoktan->hortikultuura,
            $gakpoktan->peternakan,
            $gakpoktan->perikanan,
            $gakpoktan->kwt,
            $gakpoktan->no_telepopn,
            // Mapping kolom lainnya sesuai kebutuhan
        ];
    }
    public function chunkSize(): int
    {
        return 1000; // Sesuaikan dengan ukuran chunk yang Anda inginkan
    }
}

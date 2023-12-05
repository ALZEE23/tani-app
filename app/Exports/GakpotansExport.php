<?php

namespace App\Exports;

use App\Models\Gakpoktans;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMapping;

class GakpotansExport implements FromCollection, WithHeadings, WithChunkReading, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
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
            'Desa',
            'Nama Gakpoktan',
            'Nama Ketua',
            'Pangan',
            'Perkebunan',
            'Hortikultura',
            'Peternakan',
            'Peikanan',
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

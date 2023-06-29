<?php

namespace App\Exports;

use App\Perkebunan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PerkebunanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perkebunan::all();
    }

    public function headings(): array {
        return [
            'No',
            'warga_id',
            'Jenis Perkebunan',
            'Deskripsi',
            'Luas Lahan (m2)',
            'Waktu Tanam',
            'Waktu Panen'
        ];
    }
}

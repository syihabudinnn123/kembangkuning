<?php

namespace App\Exports;

use App\Warga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class WargaExport implements FromCollection , WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Warga::all();
    }

    public function headings(): array {
        return [
            'No',
            'NIK',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'Telp',
            'Jenis Kelamin',
            'Agama',
            'Pekerjaan'
        ];
    }
}


<?php

namespace App\Imports;

use App\Warga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class WargaImport implements ToModel
{
    /**
    * @param array $row
    * @param Collection $collection
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Warga([
            'NIK' => $row[1],
            'nama' => $row[2],
            'tempat_lahir' => $row[3],
            'tanggal_lahir' => $row[4],
            'alamat' => $row[5],
            'telp' => $row[6],
            'jenis_kelamin' => $row[7],
            'agama' => $row[8],
            'pekerjaan' => $row[9],
        ]);
    }
}

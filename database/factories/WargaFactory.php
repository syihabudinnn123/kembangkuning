<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Warga;
use Faker\Generator as Faker;

$factory->define(Warga::class, function (Faker $faker) {
    // $jenisKelamin =
    // $agama = ;
    return [
        'NIK' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'nama' => $faker->name,
        'tempat_lahir' => $faker->city,
        'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'alamat'=>$faker->address,
        'telp' =>$faker->phoneNumber,
        'jenis_kelamin' =>$faker->randomElement(['Laki-laki', 'Perempuan']),
        'agama' =>$faker->randomElement(['Islam','Kristen Protestan', 'Kristen Katolik' , 'Hindu' ,'Budha', 'Konghucu']),
        'pekerjaan' => $faker->jobTitle,
    ];
});

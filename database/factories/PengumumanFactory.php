<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pengumuman;
use Faker\Generator as Faker;



$factory->define(Pengumuman::class, function (Faker $faker) {
    $randomNumber = rand(1,100);
    $gambar = "https://picsum.photos/id/{$randomNumber}/200/300";
    return [
        'nama' => $faker->name,
        'deskripsi' => $faker->sentence(50),
        'tanggal' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gambar' => $gambar
    ];
});

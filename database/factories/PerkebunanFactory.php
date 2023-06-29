<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Perkebunan;
use Faker\Generator as Faker;
use App\Warga;

$factory->define(Perkebunan::class, function (Faker $faker) {
    $faker = \Faker\Factory::create();
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return [
        'warga_id' => Warga::inRandomOrder()->first()->id,
        'jenis_perkebunan' => $faker->fruitName(),
        'deskripsi' => $faker->sentence(50),
        'luas_lahan' => $faker->numberBetween($min = 1, $max = 9000),
        'waktu_tanam'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'waktu_panen' =>$faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

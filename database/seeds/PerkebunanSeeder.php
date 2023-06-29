<?php

use Illuminate\Database\Seeder;

class PerkebunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Perkebunan::class, 15)->create();
    }
}

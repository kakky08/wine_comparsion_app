<?php

namespace Database\Seeders;

use App\Models\CountryTaste;
use Illuminate\Database\Seeder;

class CountryTastesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CountryTaste::factory()->count(10)->create();
    }
}

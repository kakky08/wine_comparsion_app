<?php

namespace Database\Seeders;

use App\Models\FavoriteTaste;
use Illuminate\Database\Seeder;

class FavoriteTastesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FavoriteTaste::factory()->count(10)->create();
    }
}

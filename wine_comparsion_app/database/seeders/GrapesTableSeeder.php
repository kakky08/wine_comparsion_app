<?php

namespace Database\Seeders;

use App\Models\Grape;
use Illuminate\Database\Seeder;

class GrapesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grape::factory()->count(10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\AromaCategory;
use Illuminate\Database\Seeder;

class AromaCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AromaCategory::factory()->count(10)->create();
    }
}

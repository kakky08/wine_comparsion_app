<?php

namespace Database\Seeders;

use App\Models\AromaSubcategory;
use Illuminate\Database\Seeder;

class AromaSubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AromaSubcategory::factory()->count(10)->create();
    }
}

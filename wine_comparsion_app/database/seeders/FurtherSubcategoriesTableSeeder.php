<?php

namespace Database\Seeders;

use App\Models\FurtherSubcategory;
use Illuminate\Database\Seeder;

class FurtherSubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FurtherSubcategory::factory()->count(10)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AromaCategoriesTableSeeder::class,
            AromaSubcategoriesTableSeeder::class,
            CountriesTableSeeder::class,
            CountryTastesTableSeeder::class,
            FavoritesTableSeeder::class,
            FavoriteTastesTableSeeder::class,
            FoldersTableSeeder::class,
            FurtherSubcategoriesTableSeeder::class,
            GrapesTableSeeder::class,
            ItemsTableSeeder::class,
            MemosTableSeeder::class,
            TypesTableSeeder::class,
            UsersTableSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}

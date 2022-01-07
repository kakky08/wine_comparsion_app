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
        $this->call(UsersTableSeeder::class);
        $this->call(MemosTableSeeder::class);
        $this->call(FoldersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(GrapesTableSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}

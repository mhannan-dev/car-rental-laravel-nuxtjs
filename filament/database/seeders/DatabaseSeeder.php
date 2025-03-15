<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\CarCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BrandSeeder::class,
            CarCategorySeeder::class,
            CarSeeder::class,
        ]);
    }
}

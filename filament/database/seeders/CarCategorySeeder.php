<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarCategorySeeder extends Seeder
{
    public function run()
    {
        // List of car categories
        $categories = [
            'Sedan', 'SUV', 'Luxury', 'Sports', 'Electric'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Category;  // Import Category model
use App\Models\Brand;     // Import Brand model

class CarSeeder extends Seeder
{
    public function run()
    {
        // Get random Category and Brand
        $categoryId = Category::inRandomOrder()->first()->id;
        $brandId = Brand::inRandomOrder()->first()->id;

        Car::create([
            'name' => 'Toyota Corolla',
            'model' => 'Corolla',
            'year' => 2023,
            'license_plate' => 'XYZ123',
            'price_per_day' => 50.00,
            'description' => 'A reliable and fuel-efficient sedan.',
            'image' => null,
            'status' => 'available',
            'category_id' => $categoryId,   // Random category
            'brand_id' => $brandId,         // Random brand
        ]);
    }
}

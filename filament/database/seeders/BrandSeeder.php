<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $brands = [
            'Toyota', 'Honda', 'Ford', 'Nissan', 'Hyundai',
            'Mercedes-Benz', 'BMW', 'Audi', 'Lexus', 'Jaguar',
            'Ferrari', 'Lamborghini', 'Porsche', 'McLaren', 'Aston Martin',
            'Tesla', 'Rivian', 'Lucid Motors', 'Polestar', 'BYD'
        ];

        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                'name' => $brand,
                'slug' => Str::slug($brand),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

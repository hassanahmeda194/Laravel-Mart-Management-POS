<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_code' => 'CAT-001',
            'name' => 'Shoes'
        ]);
        Brand::create([
            'brand_code' => 'BRD-001',
            'name' => 'AstraZen'
        ]);
        Unit::insert([
            [
                'name' => 'Grams',
                'short_code' => 'g',
                'base_unit' => 'kilogram',
                'operator' => '/',
                'operator_value' => 1000,
            ],
            [
                'name' => 'Dozen box',
                'short_code' => 'box',
                'base_unit' => 'piece',
                'operator' => '*',
                'operator_value' => 12,
            ],
            [
                'name' => 'Centimeter',
                'short_code' => 'cm',
                'base_unit' => 'Meter',
                'operator' => '/',
                'operator_value' => 100,
            ],
            [
                'name' => 'piece',
                'short_code' => 'pc',
                'base_unit' => null,
                'operator' => '*',
                'operator_value' => 1,
            ],
            [
                'name' => 'Meter',
                'short_code' => 'm',
                'base_unit' => null,
                'operator' => '*',
                'operator_value' => 1,
            ],
            [
                'name' => 'kilogram',
                'short_code' => 'kg',
                'base_unit' => null,
                'operator' => '*',
                'operator_value' => 1,
            ],
        ]);
    }
}

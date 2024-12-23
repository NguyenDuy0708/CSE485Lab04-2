<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{

    public function run(): void
    {
        $products = [
            [
                'name' => 'Bánh mi',
                'description' => 'Dai ngon',
                'price' => 100,
                'quantity' => 10
            ],
            [
                'name' => 'Mì tôm',
                'description' => 'đậm đà',
                'price' => 200,
                'quantity' => 20
            ],
            [
                'name' => 'Bộ bàn ghế',
                'description' => 'Chắc chắn',
                'price' => 300,
                'quantity' => 30
            ],
            [
                'name' => 'Product 4',
                'description' => 'Description 4',
                'price' => 400,
                'quantity' => 40
            ]
            ];          
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

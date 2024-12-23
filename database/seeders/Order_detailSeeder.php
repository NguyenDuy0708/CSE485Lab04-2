<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order_detail;
class Order_detailSeeder extends Seeder
{
    public function run(): void
    {
        $order_details = [
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 2
            ],
            [
                'order_id' => 2,
                'product_id' => 2,
                'quantity' => 3
            ],
            [
                'order_id' => 3,
                'product_id' => 3,
                'quantity' => 4
            ],
            [
                'order_id' => 4,
                'product_id' => 4,
                'quantity' => 5
            ]
            ];          
        foreach ($order_details as $order_detail) {
            Order_detail::create($order_detail);
        }
    }
}

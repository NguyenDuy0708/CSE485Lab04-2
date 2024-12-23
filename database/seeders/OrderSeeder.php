<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $orders = [
            [
                'customer_id' => 1,
                'order_date' => '2024-12-22',
                'status' => 0
            ],
            [
                'customer_id' => 2,
                'order_date' => '2024-12-22',
                'status' => 1
            ],
            [
                'customer_id' => 3,
                'order_date' => '2024-12-22',
                'status' => 0
            ],
            [
                'customer_id' => 4,
                'order_date' => '2024-12-22',
                'status' => 1
            ]
            ];          
        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}

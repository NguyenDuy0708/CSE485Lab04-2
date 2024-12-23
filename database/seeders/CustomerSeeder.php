<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    
    public function run(): void
    {
        $customers = [
            [
                'name' => 'Customer 1',
                'address' => 'Address 1',
                'phone' => '123456789',
                'email' => 'customer1@example',
            ],
            [
                'name' => 'Customer 2',
                'address' => 'Address 2',
                'phone' => '123456789',
                'email' => 'customer2@example',
            ],
            [
                'name' => 'Customer 3',
                'address' => 'Address 3',
                'phone' => '123456789',
                'email' => 'customer3@example',
            ],
            [
                'name' => 'Customer 4',
                'address' => 'Address 4',
                'phone' => '123456789',
                'email' => 'customer4@example',
            ],
        ];          
        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}

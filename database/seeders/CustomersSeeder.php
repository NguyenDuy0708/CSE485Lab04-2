<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = [
            [
                'name' => 'Nguyen Van A',
                'birthday' => '2000-01-01',
                'address' => '123 Nguyen Van A, HCM',
                'phone' => '0123456789',
                'email' => '0V5i4@example.com',
            ],
            [
                'name' => 'Nguyen Van B',
                'birthday' => '2000-01-01',
                'address' => '123 Nguyen Van B, HCM',
                'phone' => '0123456789',
                'email' => '0V5i4@example.com',        
            ],
            [
                'name' => 'Nguyen Van C',
                'birthday' => '2000-01-01',
                'address' => '123 Nguyen Van C, HCM',
                'phone' => '0123456789',
                'email' => '0V5i4@example.com',        
            ],            
        ];
        
        foreach($customer as $customer){
            Customer::create($customer);
        }
            
            
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Sữa rửa mặt Senka',
            'description' => 'Làm sạch dịu nhẹ cho da dầu mụn.',
            'price' => 65000,
        ]);
    
        Product::create([
            'name' => 'Kem chống nắng Anessa',
            'description' => 'Chống nắng SPF 50+, không gây bết rít.',
            'price' => 290000,
        ]);
    }
}

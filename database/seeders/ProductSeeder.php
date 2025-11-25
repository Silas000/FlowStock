<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Notebook Dell Inspiron 15',
                'description' => 'Notebook Dell Inspiron 15, 8GB RAM, 256GB SSD, Intel i5, 15.6" Full HD',
                'price' => 2899.90,
                'quantity' => 15,
            ],
            [
                'name' => 'Mouse Logitech MX Master 3',
                'description' => 'Mouse sem fio Logitech MX Master 3 para produtividade, sensor Darkfield',
                'price' => 399.90,
                'quantity' => 45,
            ],
            [
                'name' => 'Teclado Mecânico Redragon',
                'description' => 'Teclado mecânico Redragon Kumara, switches Outemu Blue, RGB',
                'price' => 249.90,
                'quantity' => 22,
            ],
            [
                'name' => 'Monitor Samsung 24"',
                'description' => 'Monitor LED Samsung 24 polegadas, Full HD, 75Hz, HDMI/VGA',
                'price' => 799.90,
                'quantity' => 8,
            ],
            [
                'name' => 'Headset HyperX Cloud II',
                'description' => 'Headset gamer HyperX Cloud II, 7.1 virtual surround sound, almofadas de couro',
                'price' => 499.90,
                'quantity' => 18,
            ]
        ];

        foreach ($products as $productData) {
            $product = Product::firstOrCreate(
                ['name' => $productData['name']],
                $productData
            );
        }

        $this->command->info('Products seeded successfully!');
    }

}
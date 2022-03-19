<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                'nama' => 'Headset',
                'gambar' => 'headset.jpg',
                'harga' => 100000,
                'berat' => 500,
            ],
            [
                'nama' => 'Samsung S20',
                'gambar' => 'hp.jpg',
                'harga' => 150000,
                'berat' => 700,
            ],
            [
                'nama' => 'Jam tangan Huawei',
                'gambar' => 'jam.jpg',
                'harga' => 200000,
                'berat' => 300,
            ],
            [
                'nama' => 'Kacamata google glass',
                'gambar' => 'kacamata.jpg',
                'harga' => 180000,
                'berat' => 600,
            ],
            [
                'nama' => 'Sony camera a6400',
                'gambar' => 'kamera.jpg',
                'harga' => 350000,
                'berat' => 1500,
            ],
            [
                'nama' => 'Sepatu Adidas',
                'gambar' => 'sepatu.jpg',
                'harga' => 175000,
                'berat' => 500,
            ],
            
        ];

        Product::insert($product);
    }
}

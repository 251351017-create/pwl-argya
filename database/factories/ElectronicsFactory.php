<?php

namespace Database\Factories;

use App\Models\Electronics;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Electronics>
 */
class ElectronicsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $item = $this->faker->randomElement([
            [
                'nama_barang' => 'Samsung Galaxy S24',
                'brand' => 'Samsung',
            ],
            [
                'nama_barang' => 'iPhone 15',
                'brand' => 'Apple',
            ],
            [
                'nama_barang' => 'Xiaomi Redmi Note 13',
                'brand' => 'Xiaomi',
            ],
            [
                'nama_barang' => 'LG Smart TV',
                'brand' => 'LG',
            ],
            [
                'nama_barang' => 'Sony Headphone',
                'brand' => 'Sony',
            ],
            [
                'nama_barang' => 'Asus ROG Laptop',
                'brand' => 'Asus',
            ],
            [
                'nama_barang' => 'Lenovo IdeaPad',
                'brand' => 'Lenovo',
            ],
            [
                'nama_barang' => 'iPad Air',
                'brand' => 'Apple',
            ],
        ]);
        return [
            'nama_barang' => $item['nama_barang'],
            'brand'       => $item['brand'],
            'stok'        => $this->faker->numberBetween(10, 200),
            'harga'       => $this->faker->numberBetween(50000, 5000000),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Electronics;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectronicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Electronics::factory(10)->create();
    }
}

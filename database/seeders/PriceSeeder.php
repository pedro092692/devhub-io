<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::create([
            'name' => 'Free',
            'value' => 0
        ]);

        Price::create([
            'name' => '19.99 US$ (level 1)',
            'value' => 19.99
        ]);

        Price::create([
            'name' => '49.99 US$ (level 2)',
            'value' => 49.99
        ]);

        Price::create([
            'name' => '99.99 US$ (level 3)',
            'value' => 99.99
        ]);
    }
}

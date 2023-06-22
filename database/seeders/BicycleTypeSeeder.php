<?php

namespace Database\Seeders;

use App\Models\BicycleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BicycleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BicycleType::factory()
            ->count(2)
            ->create();
    }
}

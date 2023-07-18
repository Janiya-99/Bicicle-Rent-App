<?php

namespace Database\Seeders;

use App\Models\BicycleStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BicycleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BicycleStatus::factory()->count(2)->create();
    }
}

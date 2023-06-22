<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Station::factory()
            ->count(4)
            ->hasBicycles(10)
            ->create();

        Station::factory()
            ->count(2)
            ->hasBicycles(6)
            ->create();
    }
}

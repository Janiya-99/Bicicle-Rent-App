<?php

namespace Database\Seeders;

use App\Models\Bicycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BicycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bicycle::factory()
            ->count(4)
            ->hasRecentActivities(2)
            ->hasPaths(4)
            ->hasEmergencies(2)
            ->create();

        Bicycle::factory()
            ->count(2)
            ->hasRecentActivities(5)
            ->hasPaths(2)
            ->hasEmergencies(3)
            ->create();

        Bicycle::factory()
            ->count(5)
            ->hasRecentActivities(5)
            ->hasPaths(1)
            ->hasEmergencies(4)
            ->create();
    }
}

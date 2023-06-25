<?php

namespace Database\Seeders;

use App\Models\RecentActivity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecentActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecentActivity::factory()
            ->count(5)
            ->hasWeather(4)
            ->create();
        RecentActivity::factory()
            ->count(4)
            ->hasWeather(1)
            ->create();
        RecentActivity::factory()
            ->count(2)
            ->hasWeather(5)
            ->create();
        RecentActivity::factory()
            ->count(1)
            ->create();
    }
}

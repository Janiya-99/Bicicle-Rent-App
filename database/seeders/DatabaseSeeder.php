<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EmergencyStatus;
use App\Models\Employ;
use App\Models\PaymentType;
use App\Models\RecentActivities;
use App\Models\Station;
use Illuminate\Database\Seeder;
use Database\Seeders\UserStausSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([

            UserStatusSeeder::class,
            PaymentTypeSeeder::class,
            EmergencyStatusSeeder::class,
            UserSeeder::class,
            BicycleTypeSeeder::class,
            StationSeeder::class,
            PathSeeder::class,
            RecentActivitySeeder::class,
           // WeatherSeeder::class,
            EmploySeeder::class,

        ]);
    }
}

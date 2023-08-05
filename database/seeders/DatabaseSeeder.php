<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\User;
use Database\Seeders\GpsSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\PathSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\EmploySeeder;
use Database\Seeders\StationSeeder;
use Database\Seeders\WeatherSeeder;
use Database\Seeders\EmergencySeeder;
use Database\Seeders\UserStatusSeeder;
use Database\Seeders\BicycleTypeSeeder;
use Database\Seeders\PaymentTypeSeeder;
use Database\Seeders\BicycleStatusSeeder;
use Database\Seeders\RecentActivitySeeder;
use Database\Seeders\EmergencyStatusSeeder;
use Database\Seeders\TransactionStatusSeeder;


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
            BicycleStatusSeeder::class,
            TransactionStatusSeeder::class,
            PaymentTypeSeeder::class,
            EmergencyStatusSeeder::class,
            UserSeeder::class,
            BicycleTypeSeeder::class,
            StationSeeder::class,
            PathSeeder::class,
            GpsSeeder::class,
            RecentActivitySeeder::class,
            WeatherSeeder::class,
            EmploySeeder::class,
           // EmergencySeeder::class,
        ]);
    }
}

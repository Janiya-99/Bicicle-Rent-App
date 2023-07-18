<?php

namespace Database\Seeders;

use App\Models\Gps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gps::factory()->count(5)->create();
    }
}

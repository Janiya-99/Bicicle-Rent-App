<?php

namespace Database\Seeders;

use App\Models\Emergency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmergencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emergency::factory()->count(5)->create();
    }
}

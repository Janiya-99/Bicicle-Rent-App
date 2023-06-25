<?php

namespace Database\Seeders;

use App\Models\EmergencyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmergencyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        EmergencyStatus::factory()->count(3)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Bicycle;
use App\Models\Path;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Path::factory()
            ->count(10)
            ->hasGps(10)
            ->create();

    }
}


<?php

namespace Database\Seeders;


use App\Models\Path;
use Illuminate\Database\Seeder;

class PathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Path::factory()
            ->count(10)
           // ->hasGps(10)
            ->create();

    }
}


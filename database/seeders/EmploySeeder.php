<?php

namespace Database\Seeders;

use App\Models\Employ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employ::factory()
            ->count(8)
            ->hasEmployContacts(2)
            ->hasEmergencies(2)
            ->create();

        Employ::factory()
            ->count(5)
            ->hasEmployContacts(1)
            ->hasEmergencies(3)
            ->create();
    }
}

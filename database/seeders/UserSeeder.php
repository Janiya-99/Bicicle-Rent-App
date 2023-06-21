<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
        ->count(3)
        ->hasCards(3)
        ->hasTransactions(4)
        ->hasUserContacts(2)
        ->hasUserStatus(2)
        ->create();

        User::factory()
        ->count(4)
        ->hasCards(2)
        ->hasTransactions(5)
        ->hasUserContacts(1)
        ->create();

    }
}

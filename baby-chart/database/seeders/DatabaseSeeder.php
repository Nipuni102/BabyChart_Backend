<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Child;
use App\Models\MidWife;
use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        MidWife::factory(5)->create();
        User::factory(5)->create();
        Child::factory(10)->create();
        Vaccine::factory(5)->create();
    }
}

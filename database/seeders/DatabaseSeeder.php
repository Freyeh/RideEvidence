<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StateSeeder::class,
            CitySeeder::class,
            PurposeSeeder::class,
            CarSeeder::class,
            RepairSeeder::class,
            WorkerSeeder::class,
            RideSeeder::class,
        ]);
    }
}

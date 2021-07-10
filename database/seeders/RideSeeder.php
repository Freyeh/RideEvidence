<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\City;
use App\Models\Purpose;
use App\Models\Repair;
use App\Models\Ride;
use App\Models\State;
use App\Models\Worker;
use Illuminate\Database\Seeder;

class RideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rides = Ride::factory()->count(86)->create();
    }
}

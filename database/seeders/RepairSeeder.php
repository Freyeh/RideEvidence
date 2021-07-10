<?php

namespace Database\Seeders;

use App\Models\Repair;
use Illuminate\Database\Seeder;

class RepairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repairs = Repair::factory()->count(28)->create();
    }
}

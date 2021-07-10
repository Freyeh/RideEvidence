<?php

namespace Database\Seeders;

use App\Models\Purpose;
use Illuminate\Database\Seeder;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purpose = new Purpose();
        $purpose->type = 'work_ride';
        $purpose->save();

        $purpose = new Purpose();
        $purpose->type = 'personal_ride';
        $purpose->save();
    }
}

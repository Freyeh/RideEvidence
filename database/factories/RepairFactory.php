<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\City;
use App\Models\Repair;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepairFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Repair::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reason'=>$this->faker->text(100),
            'ID_car'=>$this->faker->numberBetween(1,12),
            'costEuro'=>$this->faker->randomFloat(2,10,178),
            'ID_city'=>$this->faker->numberBetween(1,40),
        ];
    }
}

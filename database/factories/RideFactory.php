<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\City;
use App\Models\Purpose;
use App\Models\Ride;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

class RideFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ride::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ID_cityFrom'=>$this->faker->numberBetween(1,40),
            'ID_cityTo'=>$this->faker->numberBetween(1,40),
            'ID_worker'=>$this->faker->numberBetween(1,7),
            'ID_purpose'=>$this->faker->numberBetween(1,2),
            'ID_car'=>$this->faker->numberBetween(1,12),
            'fuelUsed'=>$this->faker->randomFloat(2,1,50),
            'cost'=>$this->faker->randomFloat(2,1,150),
            'image'=>'aa.jpg'
        ];
    }
}

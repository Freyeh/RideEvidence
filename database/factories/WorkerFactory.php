<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Worker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nameW'=>$this->faker->name,
            'personalNumber'=>$this->faker->numberBetween(1,2001),
            'ID_city'=>$this->faker->numberBetween(1,40),
            'phone'=>$this->faker->phoneNumber,
        ];
    }
}

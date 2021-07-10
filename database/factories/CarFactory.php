<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'tankVolume'=>$this->faker->numberBetween(25,60),
            'productionYear'=>$this->faker->year,
            'color'=>$this->faker->colorName,
            'consumption'=>$this->faker->randomFloat(2,4,12),
            'image'=>'bb.jpg'
        ];
    }
}

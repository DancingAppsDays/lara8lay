<?php

namespace Database\Factories;

use App\Models\TurnodetalleModel;
use Illuminate\Database\Eloquent\Factories\Factory;


use Faker\Generator as faker;

class TurnodetalleModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TurnodetalleModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'idempleado' =>$this->faker->randomDigit,//address,//text(20),
            'fecha' =>$this->faker->date,

            'puesto' =>$this->faker->optional(0.7, 1)->numberBetween(1,4), //address,//text(20),
            'area' =>$this->faker->optional(0.7, 1)->numberBetween(1,4), 
            'horario' =>$this->faker->numberBetween(1,3), 
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\EmpleadoModel;
use Illuminate\Database\Eloquent\Factories\Factory;


use Faker\Generator as Faker;

class EmpleadoModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmpleadoModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'puesto' => $this->faker->text(20),
            'area' =>$this->faker->optional(0.7, 1)->numberBetween(1,4), 
            'planta' => $this->faker->numberBetween(1,5), 
            //'positionx' =>$this->faker->numberBetween(1,100),   //numerify($string = '###'),      //NUMBER from UNITY SPACE::::
           // 'positiony' =>$this->faker->numberBetween(1,100),
            //
        ];
    }
}

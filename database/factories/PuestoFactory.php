<?php

namespace Database\Factories;

use App\Models\puesto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PuestoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = puesto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
              'area' =>$this->faker->optional(0.7, 1)->numberBetween(1,4), 
        ];
    }
}

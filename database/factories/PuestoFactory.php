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
            'nombre' => $this->faker->text(10),
              'area' =>$this->faker->optional(0.7, 1)->numberBetween(1,4),                    
           'positionx'=>$this->faker-> numberBetween(50,200),
           'positiony'=>$this->faker-> numberBetween(50,200),
           'rotation'=>$this->faker->optional(0.5, 0)-> numberBetween(0,180),
           'descripcion' => $this->faker->text(50),
        ];
    }
}

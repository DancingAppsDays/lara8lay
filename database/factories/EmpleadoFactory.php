<?php



namespace Database\Factories;

use App\Models\EmpleadoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;

class EmpleadoFactory extends Factory
{
    
    protected $model = EmpleadoModel::class;

      // Define the model's default state.
        //return arary


    public function definition()
    {
        return [
            'nombre' => $this->$faker->name,
            'puesto' => $this->$faker->text(20),
          
            //
        ];
    }
    
}

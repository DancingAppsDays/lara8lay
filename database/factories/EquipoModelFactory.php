<?php

namespace Database\Factories;

use App\Models\EquipoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;  //required

class EquipoModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EquipoModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
            return [
                'nombre' => $this->faker->text(15),
                'puesto' => $this->faker->text(10),  //name,        //UNTESTED
                'lastcheck' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),//date() failed, call to format()onstring
                'riskfactor' =>$this->faker->randomDigit   
                  //({min:1,max:100})  //{$min=1,$max=100}) //($nbMaxDecimals= 2,$min=1,$max=100)   //number_format(2)
                //'password' => $password ?: $password = bcrypt('secret'),
                //'remember_token' => str_random(10),
        
            
            //
        ];
    }
}

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
                'riskfactor' =>$this->faker->randomDigit,                
                'area' =>$this->faker->optional(0.7, 1)->numberBetween(1,4), 
                'positionx' =>$this->faker->numberBetween(1,100),   //numerify($string = '###'),      //NUMBER from UNITY SPACE::::
                'positiony' =>$this->faker->numberBetween(1,100), //->numerify($string = '###')
                'ruido' => $this->faker->optional(0.8, 0)->numberBetween(1,120),        //SO LIKE  20% is 0   ?probably


                  //({min:1,max:100})  //{$min=1,$max=100}) //($nbMaxDecimals= 2,$min=1,$max=100)   //number_format(2)
                //'password' => $password ?: $password = bcrypt('secret'),
                //'remember_token' => str_random(10),
        
            
            //
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\EquipoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
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

    //use Faker\Generator as Faker;


    //$factory->define(App\EquipoModel::class, function (Faker $faker) {
        //static $password;
        public function definition()
        {
        return [
            'nombre' => $faker->text(15),  //name,
            'lastcheck' => $faker->date,//address,//text(20),
            'riskfactor' =>$faker->randomDigit   
              //({min:1,max:100})  //{$min=1,$max=100}) //($nbMaxDecimals= 2,$min=1,$max=100)   //number_format(2)
            //'password' => $password ?: $password = bcrypt('secret'),
            //'remember_token' => str_random(10),
    
        ];
    }


        /*
    public function definition()
    {
        return [
            //
            protected $fillable = ["nombre","puesto","lastcheck"];
        ];

        
    }*/
}

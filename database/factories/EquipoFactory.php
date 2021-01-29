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
       
       // $random_number = intval( "0" . rand(1,9) . rand
        //$pos1 = rand(5, 15);
        // $pos1 =rand(0, 100);          //thats UNITY dependant
       // $pos2 = mt_rand(0, 100);  
       //echo  rand(5, 15);
       //$pos2 = $faker->randomDigit;

       

       // string $posa =  $faker->randomElement(['active', 'completed', 'on hold']);

        public function definition()
        {

           

        return [                //DID THIS SHIT EVEN WORKEDD? ? ? MIGHT HAVE IN LARA 5.6
            'nombre' => $faker->text(15),  //name,
            'lastcheck' => $faker->date,//address,//text(20),
            'riskfactor' =>$faker->randomDigit,
            'area' =>$faker->randomDigit,
            'positionx' =>$faker->numerify($string = '###'),
            'positiony' =>$faker->numerify($string = '###')
                             //$faker-> randomDigit,
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

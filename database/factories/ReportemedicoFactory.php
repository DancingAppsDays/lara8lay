<?php

namespace Database\Factories;

use App\Models\Reportemedico;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportemedicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reportemedico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   /*
        $rand1= rand(50,200);
        $rand2= rand(50,200);
        $rand3= rand(50,1100);
        $rand4= rand(50,1100);
        $rand5= rand(50,200);*/
        return [
            //
            //'nombre' => $this->faker->text(15),
            'idempleado' =>$this->faker->randomDigit,
                //'puesto' => $this->faker->text(10),  //name,        //UNTESTED
                'fecha' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),  //date,//->format("Y-m-d"),// H:i:s"),//address,//text(20),
                'contenido' =>$this->faker->text(400),
              'presionA'=>$this->faker-> numberBetween(50,200),
               'presionB'=>$this->faker->numberBetween(50,200),
               'colesterol'=>$this->faker->numberBetween(50,999),       //1000causeerror with decimal(5,3)
               'azucar'=>$this->faker->numberBetween(50,999),
               'vista'=>$this->faker->numberBetween(50,200)      //no rand not even variable??
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Audioex;
use Illuminate\Database\Eloquent\Factories\Factory;

class AudioexFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Audioex::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idempleado' =>$this->faker->randomDigit,
            'nombre' => $this->faker->name,
            'fecha' =>$this->faker->dateTimeBetween('-30 years','now')->format('Y-m-d'),

        'i250' =>$this->faker->optional(0.7, 10)->numberBetween(0,40), 
            'i500' =>$this->faker->optional(0.7, 10)->numberBetween(1,40), 
           'i1000' =>$this->faker->optional(0.7, 10)->numberBetween(1,40), 
           'i2000' =>$this->faker->optional(0.7, 10)->numberBetween(1,40), 
           'i3000' =>$this->faker->optional(0.7,20)->numberBetween(1,40), 
            'i4000' =>$this->faker->optional(0.7, 20)->numberBetween(1,40), 
            'i6000'=>$this->faker->optional(0.7, 10)->numberBetween(1,40), 
           'i8000'=>$this->faker->optional(0.7, 10)->numberBetween(1,40), 

           'd250' =>$this->faker->optional(0.7, 10)->numberBetween(1,40), 
           'd500' =>$this->faker->optional(0.7, 10)->numberBetween(1,40), 
           'd1000'=>$this->faker->optional(0.7, 10)->numberBetween(1,40), 
            'd2000'=>$this->faker->optional(0.7, 20)->numberBetween(1,40), 
            'd3000'=>$this->faker->optional(0.7, 20)->numberBetween(1,40), 
           'd4000'=>$this->faker->optional(0.7, 10)->numberBetween(1,40), 
           'd6000'=>$this->faker->optional(0.7, 10)->numberBetween(1,40),  
            'd8000'=>$this->faker->optional(0.7, 10)->numberBetween(1,40), 

           'bi250' =>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
           'bi500'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
            'bi1000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
           'bi2000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
           'bi3000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
           'bi4000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
            'bi6000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10),    
           'bi8000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 

            'bd250'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
           'bd500'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
            'bd1000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
           'bd2000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
           'bd3000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
           'bd4000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 
           'bd6000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10),   
           'bd8000'=>$this->faker->optional(0.7, 0)->numberBetween(-10,10), 

            //
        ];
    }
}

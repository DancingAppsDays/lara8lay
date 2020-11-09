<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use App\Models\EmpleadoModel;
use App\Models\EmpleadoModel;

class Empleadoseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      EmpleadoModel::factory()    //For user with POST Relation "
      ->times(50)
      ->hasPosts(1)
      ->create();
        

      //factory(App\Models\EmpleadoModel::class, 50)->create();

         //factory(App\EmpleadoModel::Class,33) ->create();  //lara 5.4
       //  factory(App\EquipoModel::Class,33) ->create();

      // EmpleadoModel::factory()                        ->times(50) ->hasPosts(1)->create();

      //Empleadoseed::factory()->count(30)->create();
      //App\Models\EmpleadoModel::factory()->count(30)->create();
      //factory(App\Models\EmpleadoModel::class,50)->create();
    }
}

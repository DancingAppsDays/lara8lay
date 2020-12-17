<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmpleadoModel;
use App\Models\EquipoModel;
use App\Models\User;
use App\Models\TurnodetalleModel;
use App\Models\Reportemedico;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //funciona con el modelo si la factory se llama igual    - --laravel 8
      EmpleadoModel::factory(35)->create(); //FUNCIONA PERO TRATA de insertan en empleado_models tabla..
      
      EquipoModel::factory(35)->create();
      
      User::factory(4)->create();
      
      TurnodetalleModel::factory(200)->create();
      
      Reportemedico::factory(80)->create();
      //User::factory(5)->create();

        //DB::table('empleados')-> fix in model

        $this->call([
            //UserSeeder::class,
           // Empleadoseed::class,
         ]);
        //$this->call(Empleadoseed::class);
       // $this->call(areasseeder::class);
         //\App\Models\EmpleadoModel::factory(10)->create();
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createempleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');  //bigincrements?? creo unquie
            $table->string('nombre');//->unique(); //nullable
            $table->string('puesto');

            $table->string('area')->nullable();                 //21 podría ser uint
            $table->string('planta')->nullable(); 
            //$table->decimal('positionx',7,2)->nullable(); 
            //$table->decimal('positiony',7,2)->nullable(); 
           

            $table->longText('profilepic')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
        //
    }
}

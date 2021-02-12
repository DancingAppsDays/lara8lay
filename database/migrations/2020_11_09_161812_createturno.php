<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createturno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('turnodetalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');
            //$table->integer('nombre')->nullable(); //MAYBE????
            
            $table->integer('puesto')->nullable();      //Vector3 pos?
            $table->integer('area')->nullable();     //might come from Catalogo Areas table class
            $table->integer('horario')->nullable();  //1 ,2 ,3
           
            $table->date('fecha');

            $table->integer('idmaquina')->unsigned()->nullable();   
            //$table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');
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
        //
        Schema::dropIfExists('turnodetalles');
    }
}

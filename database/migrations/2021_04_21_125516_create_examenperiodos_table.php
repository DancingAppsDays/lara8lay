<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenperiodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenperiodos', function (Blueprint $table) {
            $table->id();

            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');

            $table->date('fecha');

            $table->boolean('realizado')->nullable(); 
            $table->boolean('ingreso')->nullable();


            $table->boolean('examenmeb')->nullable();        //al crearlo se define cuales lleva...
            $table->boolean('audiob')->nullable(); 
            $table->boolean('espirob')->nullable(); 
            $table->boolean('rayoxb')->nullable(); 
            $table->boolean('labsangreb')->nullable(); 
            $table->boolean('laborinab')->nullable(); 
            

            $table->integer('idexamenperiod')->unsigned()->nullable();   
            $table->foreign('idexamenperiod')->references('id')-> on('Examenme')->onDelete('set null');

            $table->integer('idaudioex')->unsigned()->nullable();    
            $table->foreign('idaudioex')->references('id')-> on('Audioex')->onDelete('set null');
            
            $table->integer('idespiro')->unsigned()->nullable();  
            $table->integer('idrayosx')->unsigned()->nullable();          //Missing hacer refreencia a tablas nuevas....

            //$table->integer('realizado')->nullable();          

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
        Schema::dropIfExists('examenperiodos');
    }
}

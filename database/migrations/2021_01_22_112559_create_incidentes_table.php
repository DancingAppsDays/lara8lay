<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');
            $table->string('nombre');

            $table->string('depa');       //departamento y puesto

            //$table->dateTime('time')->default(\Carbon\Carbon::now());
            //$table->timestamp('time')->useCurrent = true;
            $table->dateTime('fechacci'); 
            $table->dateTime('fechaservi'); 

            $table->integer('turnodia')->nullable(); 
            $table->integer('diasper')->nullable(); 

            $table->string('partec');
            $table->text('diagnos');
            $table->text('tratat')->nullable();
            $table->text('mecan')->nullable();

            $table->text('tipoacci')->nullable();
            $table->text('dispo')->nullable();
            $table->string('grave')->nullable();
            $table->string('pronos')->nullable();

            $table->string('observa')->nullable();
            $table->string('nombredoc')->nullable();


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
        Schema::dropIfExists('incidentes');
    }
}

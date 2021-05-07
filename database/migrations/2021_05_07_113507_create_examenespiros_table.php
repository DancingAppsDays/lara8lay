<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenespirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenespiros', function (Blueprint $table) {
            $table->increments('id');        //not necesario? aparentemente
            $table->timestamps();


            $table->string('tipoexamen');           //podría ser un entero del catalogo, mismo nombre en varios tipos para su consumo en list all, probablemente deprecado en historial anual mode

            $table->integer('idperiodo')->unsigned()->nullable();   
            $table->foreign('idperiodo')->references('id')-> on('examenperiodo')->onDelete('set null'); //UNTESTED

            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');

            $table->integer('mejorfvc')->nullable();  
            $table->integer('mejorfev1')->nullable(); 
            $table->integer('fvc')->nullable(); 
            $table->integer('fev1')->nullable(); 
            $table->integer('fev1fvc')->nullable(); 
            $table->integer('fev3fvc')->nullable(); 
            $table->integer('pef')->nullable(); 
            $table->integer('fef50')->nullable(); 
            $table->integer('mtt')->nullable(); 
            $table->integer('fev1fev05')->nullable(); 
            $table->integer('fev1pef')->nullable(); 
            $table->integer('vext')->nullable(); 
            $table->integer('fev6')->nullable(); 
            $table->integer('fev1fev6')->nullable(); 
            $table->integer('edadpulmon')->nullable(); 

            $table->longText('pdf')->nullable(); 



            $table->date('fecha')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examenespiros');
    }
}

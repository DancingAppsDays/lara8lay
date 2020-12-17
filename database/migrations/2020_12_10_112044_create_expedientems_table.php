<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientems', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');
            $table->string('nombre');
            $table->string('imss');         //clave candidata
            $table->string('sangre');           //4 digitos max?
            $table->integer('edad');
            $table->date('fechan');
            $table->string('sexo');
            $table->string('estadocivil'); 
            $table->string('domicilio'); 
            //$table->string('email'); 
            $table->string('telefon');//->unsigned();
            $table->string('celfon')->nullable();
            $table->string('pac_estado');
            $table->string('lugarnac');
            $table->integer('cp');
            
            $table->string('escolaridad');

            $table->string('contactoeme');
            $table->string('domicilioeme');
            $table->string('telefoneme');


            $table->text('medem')->nullable();
            $table->text('medimss')->nullable();

            $table->text('padecimientos1')->nullable();
            $table->text('padecimientos2')->nullable();
            $table->text('tratamientos1')->nullable();
            $table->text('tratamientos2')->nullable();

            $table->text('acci1')->nullable();
            $table->text('acci2')->nullable();
            $table->text('acci3')->nullable();
            $table->text('accidescrip')->nullable();

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
        Schema::dropIfExists('expedientems');
    }
}

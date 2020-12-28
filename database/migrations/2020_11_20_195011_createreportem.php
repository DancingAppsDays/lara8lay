<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createreportem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reportemedico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');
            $table->date('fecha');
            $table->text('contenido');//  //was string,255);    // ? ? ? need more stringg!!

            $table->integer('presionA')->nullable();
            $table->integer('presionB')->nullable();
            $table->decimal('colesterol',8,3)->nullable();  //ocho entotal. 5 a la izquierda
            $table->decimal('azucar',8,3)->nullable();
            $table->integer('vista')->nullable();
            
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
        Schema::dropIfExists('reportemedico');
    }
}

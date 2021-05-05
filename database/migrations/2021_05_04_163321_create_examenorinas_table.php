<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenorinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenorinas', function (Blueprint $table) {
           // $table->id();
           $table->increments('id');        //not necesario? aparentemente
            $table->timestamps();


            $table->string('tipoexamen');           //podría ser un entero del catalogo, mismo nombre en varios tipos para su consumo en list all, probablemente deprecado en historial anual mode

            $table->integer('idperiodo')->unsigned()->nullable();   
            $table->foreign('idperiodo')->references('id')-> on('examenperiodo')->onDelete('set null'); //UNTESTED

            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');


            $table->string('colorina')->nullable();             //make catalogo en vez de descripcion?
            $table->string('aspectoorina')->nullable();
            $table->string('olorina')->nullable();  
            $table->integer('densidad')->nullable();
            $table->integer('ph')->nullable();
            $table->integer('glucorina')->nullable();

            $table->integer('proteorina')->nullable();
            $table->string('hemoglorina')->nullable();
            $table->integer('cetorina')->nullable();
            $table->integer('biliorina')->nullable();
            $table->integer('urobiliorina')->nullable();
            $table->string('nitriorina')->nullable();
            $table->integer('leucorina')->nullable();
            $table->integer('eritrorina')->nullable();
            $table->integer('fosfatorina')->nullable();
            $table->string('bacteorina')->nullable();

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
        Schema::dropIfExists('examenorinas');
    }
}

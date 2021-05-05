<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamensangresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examensangres', function (Blueprint $table) {
            
            
            $table->increments('id');        //not necesario? aparentemente
            $table->timestamps();


          
            $table->string('tipoexamen');           //podría ser un entero del catalogo, mismo nombre en varios tipos para su consumo en list all, probablemente deprecado en historial anual mode

            $table->integer('idperiodo')->unsigned()->nullable();   
            $table->foreign('idperiodo')->references('id')-> on('examenperiodo')->onDelete('set null'); //UNTESTED

            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');


            $table->string('glucoser')->nullable();             //make catalogo en vez de descripcion?
            $table->string('ureaser')->nullable();
            $table->string('nitroureo')->nullable();  
            $table->string('creatinina')->nullable();
            $table->string('relacionbun')->nullable();
            $table->string('hemogluco')->nullable();

            $table->string('sangretipo')->nullable();
          
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
        Schema::dropIfExists('examensangres');
    }
}

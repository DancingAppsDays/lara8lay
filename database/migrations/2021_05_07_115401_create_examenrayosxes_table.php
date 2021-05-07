<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenrayosxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenrayosxes', function (Blueprint $table) {
            $table->increments('id');        //not necesario? aparentemente
            $table->timestamps();


            $table->string('tipoexamen');        

            $table->integer('idperiodo')->unsigned()->nullable();   
            $table->foreign('idperiodo')->references('id')-> on('examenperiodo')->onDelete('set null'); //UNTESTED

            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');

           
            $table->longText('toraxpic')->nullable(); 
            $table->longText('brazoipic')->nullable(); 
            $table->longText('brazodpic')->nullable(); 
           
            $table->mediumText('diagnos')->nullable(); 



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
        Schema::dropIfExists('examenrayosxes');
    }
}

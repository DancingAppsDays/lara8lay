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
            $table->date('fecha');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsodetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usodetalles', function (Blueprint $table) {
            $table->id();

            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');

            $table->integer('idmaquina')->unsigned();   
            $table->foreign('idmaquina')->references('id')-> on('Maquina')->onDelete('set null');

            $table->integer('idturno')->unsigned();   
            $table->foreign('idturno')->references('id')-> on('Turnodetalle')->onDelete('set null');

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
        Schema::dropIfExists('usodetalles');
    }
}

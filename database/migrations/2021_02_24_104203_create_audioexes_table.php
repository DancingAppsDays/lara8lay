<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audioexes', function (Blueprint $table) {
            $table->id();

            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');
            
            $table->string('nombre')->nullable();
            $table->string('fecha')->nullable();        //created_at?
         
            $table->integer('i250')->nullable();
            $table->integer('i500')->nullable();
            $table->integer('i1000')->nullable();
            $table->integer('i2000')->nullable();
            $table->integer('i3000')->nullable();
            $table->integer('i4000')->nullable();
            $table->integer('i6000')->nullable();   
            $table->integer('i8000')->nullable();

            $table->integer('d250')->nullable();
            $table->integer('d500')->nullable();
            $table->integer('d1000')->nullable();
            $table->integer('d2000')->nullable();
            $table->integer('d3000')->nullable();
            $table->integer('d4000')->nullable();
            $table->integer('d6000')->nullable();   
            $table->integer('d8000')->nullable();

            $table->integer('bi250')->nullable();
            $table->integer('bi500')->nullable();
            $table->integer('bi1000')->nullable();
            $table->integer('bi2000')->nullable();
            $table->integer('bi3000')->nullable();
            $table->integer('bi4000')->nullable();
            $table->integer('bi6000')->nullable();   
            $table->integer('bi8000')->nullable();

            $table->integer('bd250')->nullable();
            $table->integer('bd500')->nullable();
            $table->integer('bd1000')->nullable();
            $table->integer('bd2000')->nullable();
            $table->integer('bd3000')->nullable();
            $table->integer('bd4000')->nullable();
            $table->integer('bd6000')->nullable();   
            $table->integer('bd8000')->nullable();





            $table->text('descripcion')->nullable();    


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
        Schema::dropIfExists('audioexes');
    }
}

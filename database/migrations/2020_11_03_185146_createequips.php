<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createequips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('equips', function (Blueprint $table) {

            $table->engine = 'InnoDB';  //para FK referencials//NOTTested
            $table->increments('id');
            $table->string('nombre');//->unique(); //nullable

            $table->integer('area')->nullable();                 //21 podría ser uint
            $table->string('positionx')->nullable(); 
            $table->string('positiony')->nullable();            //is actulally z

            $table->string('ruido')->nullable(); 
            $table->string('polvo')->nullable(); 

            $table->string('puesto')->nullable();   //Vector3 position?
            $table->string('lastcheck')->nullable();//->unique(); //nullable    //after the fact
            $table->decimal('riskfactor',1,0)->nullable();
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
        Schema::dropIfExists('equips');
    }
}

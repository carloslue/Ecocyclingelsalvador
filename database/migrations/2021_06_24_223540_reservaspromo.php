<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservaspromo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaspromo', function (Blueprint $table) {
         
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clienteID');
            $table->unsignedBigInteger('promocionID');
            $table->date('fecha_visita');
            $table->time('hora');
            
            $table->timestamps();
            $table->foreign('clienteID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('promocionID')->references('id')->on('promociones')->onDelete('cascade')->onUpdate('cascade');
           
        });   //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservaspromo');//  //
    }
}

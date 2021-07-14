<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservaspromos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaspromos', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('clienteID');
        $table->unsignedBigInteger('promocionID');
        $table->date('fecha_visita');
        $table->time('hora');
        
        $table->timestamps();
        $table->foreign('clienteID')->references('id')->on('users');
        $table->foreign('promocionID')->references('id')->on('promociones');
       
    });   ////
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservaspromos');//  // //
    }
}

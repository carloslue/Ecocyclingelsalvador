<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservas extends Migration
{

    public function up()
    {
       Schema::create('reservas', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->unsignedBigInteger('clienteID');
           $table->unsignedBigInteger('rutaID');
           $table->date('fecha');
           $table->time('hora');
           $table->integer('cantidad');
           $table->integer('telefono');
           $table->timestamps();
           $table->foreign('clienteID')->references('id')->on('users');
           $table->foreign('rutaID')->references('id')->on('rutas');
       });
        //
    }

    public function down()
    {
      Schema::dropIfExists('reservas');  //
    }
}

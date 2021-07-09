<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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
           $table->foreign('clienteID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('rutaID')->references('id')->on('rutas')->onDelete('cascade')->onUpdate('cascade');
       });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('reservas');  //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Promociones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('promociones', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->unsignedBigInteger('rutasID');
         $table->unsignedBigInteger('equipoID');
         $table->integer('cantidad');
         $table->string('descripcion');
         $table->decimal('precio');
         $table->date('fecha_vigencia');
         $table->string('estado');

         $table->timestamps();
         $table->foreign('rutasID')->references('id')->on('rutas');
         $table->foreign('equipoID')->references('id')->on('equipos');

     });   //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('promociones');  //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Equipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('equipos', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('cantidad');
           $table->string('descripcion_equipo');
           
           $table->timestamps();
       }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('equipos');  //
    }
}

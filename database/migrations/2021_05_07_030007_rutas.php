<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rutas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('rutas', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('imagen');
           $table->string('titulo');
           $table->string('descripcion_rutas');
           $table->decimal('costo');
           $table->string('estado');
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
       Schema::dropIfExists('rutas'); //
    }
}

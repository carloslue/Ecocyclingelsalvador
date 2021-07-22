<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ventascomun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ventascomunes', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('factura');
          $table->string('nombre');
          $table->string('ruta');
          $table->decimal('precio');
          $table->date('fecha');
          $table->timestamps();
      });   //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventascomunes');//
    }
}

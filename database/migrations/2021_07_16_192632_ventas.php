<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ventas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ventas', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('factura');
           $table->string('nombre');
           $table->string('promocion');
           $table->decimal('precio');
           $table->date('fecha');
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
      Schema::dropIfExists('ventas');  //
    }
}

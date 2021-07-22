<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Informacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('informacions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('mision');
          $table->string('vision');
          $table->timestamps();
      });  //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('informacions');  //
    }
}

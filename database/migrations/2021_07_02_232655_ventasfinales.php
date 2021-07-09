<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ventasfinales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventasfinales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dia');
            $table->integer('n_factura_inicio');
            $table->integer('n_factura_final');
            $table->string('n_caja');
            $table->decimal('ventas_internas_exentas');
            $table->decimal('ventas_internas_locales');
            $table->decimal('exportaciones');
            $table->decimal('total_ventas');
            $table->decimal('ventas_a_cuenta_terceros');
            $table->decimal('iva_retenido');
            $table->decimal('iva_percibido');
            
            $table->timestamps();
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
       Schema::dropIfExists('ventasfinales');//
    }
}

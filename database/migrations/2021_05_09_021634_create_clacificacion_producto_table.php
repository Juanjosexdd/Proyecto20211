<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClacificacionProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clacificacion_producto', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('producto_id')->nullable();
            $table->unsignedBigInteger('clacificacion_id')->nullable();
            
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('clacificacion_id')
                  ->references('id')
                  ->on('clacificacions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clacificacion_producto');
    }
}

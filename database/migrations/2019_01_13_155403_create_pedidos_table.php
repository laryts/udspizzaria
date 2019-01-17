<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('idPedidos');
            
            $table->integer('idTamanhos')->unsigned();
            $table->foreign('idTamanhos')->
                references('idTamanhos')->
                on('tamanhos')->
                onDelete('cascade');

            $table->integer('idSabores')->unsigned();
            $table->foreign('idSabores')->
                references('idSabores')->
                on('sabores')->
                onDelete('cascade');

            $table->integer('idUsers')->unsigned();
            $table->foreign('idUsers')->
                references('id')->
                on('users')->
                onDelete('cascade');
                
            $table->float('pdValor');
            $table->integer('pdTempo');
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
        Schema::dropIfExists('pedidos');
    }
}

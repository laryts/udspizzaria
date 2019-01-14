<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdicionaisdospedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicionaisdospedidos', function (Blueprint $table) {
            $table->integer('idPedidos')->unsigned();
            $table->foreign('idPedidos')->
                references('idPedidos')->
                on('pedidos')->
                onDelete('cascade');
            $table->integer('idAdicionais')->unsigned();
            $table->foreign('idAdicionais')->
                references('idAdicionais')->
                on('adicionais')->
                onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adicionaisdospedidos');
    }
}

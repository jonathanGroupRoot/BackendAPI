<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('Estoque_idEstoque');
            $table->foreign('Estoque_idEstoque')->references('id')->on('estoques');

            $table->unsignedBigInteger('Colaborador_idColaborador');
            $table->foreign('Colaborador_idColaborador')->references('id')->on('colaboradors');
            
            $table->timestamps();

            // idEntrada INT
            // Estoque_idEstoq…
            // Colaborador_idC…
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}

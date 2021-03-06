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
            $table->integer('quantidade');
            
            $table->bigInteger('Estoque_idEstoque')->unsigned();
            $table->foreign('Estoque_idEstoque')->references('id')->on('estoques')->onDelete('cascade');

            $table->bigInteger('Colaborador_idColaborador')->unsigned();
            $table->foreign('Colaborador_idColaborador')->references('id')->on('colaboradors')->onDelete('cascade');
            
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
        Schema::dropIfExists('entradas');
    }
}

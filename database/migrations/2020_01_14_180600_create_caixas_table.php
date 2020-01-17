<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaixasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caixas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('valor')->NotNull();
            $table->boolean('tipoDeEntrada',1);
            $table->bigInteger('id_Colaborador')->unsigned()->nullable();
            $table->foreign('id_Colaborador')->references('id')->on('colaboradors')->onDelete('cascade');
            $table->bigInteger('id_Consulta')->unsigned()->nullable();
            $table->foreign('id_Consulta')->references('id')->on('consultas')->onDelete('cascade');
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
        Schema::dropIfExists('caixas');
    }
}

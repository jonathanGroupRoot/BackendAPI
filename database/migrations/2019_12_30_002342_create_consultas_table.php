<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dadaDeCadastro');
            $table->string('tipoDeAtendimento');

            $table->unsignedBigInteger('Procedimento_idProcedimento ');
            $table->foreign('Procedimento_idProcedimento ')->references('id')->on('procedimentos');

            $table->unsignedBigInteger('Colaborador_idColaborador');
            $table->foreign('Colaborador_idColaborador')->references('id')->on('colaboradors');

            $table->unsignedBigInteger('Cliente_idCliente');
            $table->foreign('Cliente_idCliente')->references('id')->on('clientes');
            
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
        Schema::dropIfExists('consultas');
    }
}

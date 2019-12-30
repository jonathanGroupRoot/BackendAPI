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
            $table->bigInteger('Procedimento_idProcedimento')->unsigned();
            $table->foreign('Procedimento_idProcedimento')->references('id')->on('procedimentos')->onDelete('cascade');
            $table->bigInteger('Colaborador_idColaborador')->unsigned();
            $table->foreign('Colaborador_idColaborador')->references('id')->on('colaboradores')->onDelete('cascade');
            $table->bigInteger('Cliente_idCliente')->unsigned();
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

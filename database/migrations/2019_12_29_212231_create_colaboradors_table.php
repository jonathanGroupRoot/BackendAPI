<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Pessoa_idPessoa');
            $table->foreign('Consulta_idConsulta ')->references('id')->on('consultas');
            $table->integer('PIS');
            $table->string('cargo',255);
            $table->string('conta',255);
            $table->string('tipoDaConta',45);
            $table->string('agencia',255);
            $table->integer('salario');
            $table->date('dataDeAdmissao');
            $table->timestamps();
        });
    }

        // idColaborador INT
        // Pessoa_idPessoa INT
        // PIS INT
        // cargo VARCHAR(255)
        // conta VARCHAR(255)
        // tipoDaConta VARCHAR(45)
        // agencia VARCHAR(255)
        // salario INT
        // dataDeAdmissao DATE

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaboradors');
    }
}

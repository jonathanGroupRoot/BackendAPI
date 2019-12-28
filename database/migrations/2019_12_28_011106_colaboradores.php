<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Colaboradores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Pessoa_idPessoa');
            $table->foreign('Pessoa_idPessoa')->references('id')->on('pessoa');
            $table->boolean('responsavel',1);
            $table->timestamps();
        });

        // idColaborador INT
        // Pessoa_idPessoa INT
        // PIS INT
        // cargo VARCHAR(255)
        // conta VARCHAR(255)
        // tipoDaConta VARCHAR(45)
        // agencia VARCHAR(255)
        // salario INT
        // dataDeAdmissao DATE
    }

        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaboradores');
    }
}

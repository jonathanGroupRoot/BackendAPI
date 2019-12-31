<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome',255);
            $table->integer('CPF');
            $table->date('dataDeNascimento');
            $table->date('dataDeCadastro');
            $table->integer('RG');
            $table->string('endereco',255);
            $table->integer('telefone');
            $table->boolean('sexo',1);
            $table->string('nacionalidade',255);
            $table->boolean('ativo',1);
            $table->timestamps();
        });

        // idPessoa INT
        // name VARCHAR(255)
        // cpf INT
        // dataDeNascimento DATE
        // dataDeCadastro DATE
        // rg INT
        // endereco VARCHAR(255)
        // telefone INT
        // sexo BINARY(1)
        // nacionalidade VARCHAR(255)
        // ativo BINARY(1)
    }

        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}

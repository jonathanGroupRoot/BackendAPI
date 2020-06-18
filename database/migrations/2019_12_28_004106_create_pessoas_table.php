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
            $table->string('CPF',14)->unique();
            $table->date('dataDeNascimento');
            $table->string('RG',7)->unique();
            $table->string('endereco',255);
            $table->string('CEP',9);
            $table->string('telefone',16);
            $table->boolean('sexo',1);
            $table->string('nacionalidade',255)->default('Brasil');
            $table->string('motivo',255)->nullable();
            $table->boolean('ativo',1);
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
        Schema::dropIfExists('pessoas');
    }
}

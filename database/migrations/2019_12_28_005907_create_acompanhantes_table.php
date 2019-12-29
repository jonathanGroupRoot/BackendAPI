<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Acompanhante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acompanhantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Pessoa_idPessoa');
            $table->foreign('Pessoa_idPessoa')->references('id')->on('pessoa');
            $table->boolean('responsavel',1);
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
        Schema::dropIfExists('acompanhantes');
    }
}

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
            $table->bigInteger('Pessoa_idPessoa')->unsigned();
            $table->foreign('Pessoa_idPessoa')->references('id')->on('pessoas')->onDelete('cascade');
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

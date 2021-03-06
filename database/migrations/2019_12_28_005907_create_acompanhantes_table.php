<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcompanhantesTable extends Migration
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
            $table->bigInteger('Pessoa_idPessoa')->unsigned()->nullable();
            $table->foreign('Pessoa_idPessoa')->references('id')->on('pessoas')->onDelete('cascade');
            $table->boolean('responsavel',1)->nullable();
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

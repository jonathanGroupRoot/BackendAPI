<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('Acompanhante_idAcompanhante')->unsigned();
            $table->foreign('Acompanhante_idAcompanhante')->references('id')->on('acompanhantes')->onDelete('cascade');

            $table->bigInteger('Pessoa_idPessoa')->unsigned();
            $table->foreign('Pessoa_idPessoa')->references('id')->on('pessoas')->onDelete('cascade');
            

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
        Schema::dropIfExists('clientes');
    }
}

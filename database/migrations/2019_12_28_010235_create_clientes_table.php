<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cliente extends Migration
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
            
            $table->unsignedBigInteger('Acompanhante_idAcompanhante');
            $table->foreign('Acompanhante_idAcompanhante ')->references('id')->on('acompanhante');

            $table->unsignedBigInteger('Pessoa_idPessoa');
            $table->foreign('Pessoa_idPessoa ')->references('id')->on('pessoa');
            

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

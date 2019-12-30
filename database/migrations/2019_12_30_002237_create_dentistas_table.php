<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dentista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentistas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('CRO');
            $table->string('especialidades',255);
            $table->boolean('responsavelTecnico',1);

            $table->unsignedBigInteger('Colaborador_idColaborador');
            $table->foreign('Colaborador_idColaborador')->references('id')->on('colaboradors');

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
        Schema::dropIfExists('dentistas');
    }
}

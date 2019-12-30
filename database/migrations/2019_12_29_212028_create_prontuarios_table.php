<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProntuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prontuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numeracaoDoDente');
            $table->date('dataDoProcedimento');
            $table->date('dataDeRetorno');

            $table->unsignedBigInteger('Consulta_idConsulta');
            $table->foreign('Consulta_idConsulta ')->references('id')->on('consultas');

            $table->unsignedBigInteger('Dentista_idDentista ');
            $table->foreign('Dentista_idDentista')->references('id')->on('dentistas');
            

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
        Schema::dropIfExists('prontuarios');
    }
}

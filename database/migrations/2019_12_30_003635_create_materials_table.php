<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome',255);
            $table->string('codigo',255);
            $table->int('preco',255);
            $table->unsignedBigInteger('Fornecedor_idFornecedor');
            $table->foreign('Fornecedor_idFornecedor')->references('id')->on('fornecedors');
            $table->timestamps();

            // idMaterial INT
            // nome VARCHAR(255)
            // codigo VARCHAR(255)
            // preco INT
            // Fornecedor_idFornecedor INT
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}

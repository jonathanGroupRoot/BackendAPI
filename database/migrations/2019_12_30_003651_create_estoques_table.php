<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantidade');
            $table->date('data');
            $table->unsignedBigInteger('Material_idMaterial');
            $table->foreign('Material_idMaterial')->references('id')->on('materials');
            $table->timestamps();

            // idEstoque INT
            // quantidade INT
            // data DATE
            // Material_idMaterial INT
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoques');
    }
}

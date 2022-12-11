<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerenciamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerenciamento', function (Blueprint $table) {
            $table->id('IDGERENCIAMENTO');
            $table->bigInteger('IDLOTE')->unsigned();
            $table->foreign('IDLOTE')->references('IDLOTE')->on('lote');
            $table->bigInteger('IDDIETA')->unsigned();
            $table->foreign('IDDIETA')->references('IDDIETA')->on('dieta');
            $table->bigInteger('IDPASTAGEM')->unsigned();
            $table->foreign('IDPASTAGEM')->references('IDPASTAGEM')->on('pastagem');
            $table->longText('DSOBSERVACOES');
            $table->string('FLATIVO', 1)->nullable();
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
        Schema::dropIfExists('gerenciamento');
    }
}

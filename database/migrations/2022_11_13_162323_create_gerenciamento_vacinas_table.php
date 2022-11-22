<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerenciamentoVacinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerenciamento_vacinas', function (Blueprint $table) {
            $table->id('IDGERENCIAMENTOVACINA');
            $table->bigInteger('IDGERENCIAMENTO')->unsigned();
            $table->foreign('IDGERENCIAMENTO')->references('IDGERENCIAMENTO')->on('gerenciamento');
            $table->bigInteger('IDVACINA')->unsigned();
            $table->foreign('IDVACINA')->references('IDVACINA')->on('vacinas');
            $table->date('DTAPLICACAO');
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
        Schema::dropIfExists('gerenciamento_vacinas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoteAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote_animal', function (Blueprint $table) {
            $table->id('IDLOTEANIMAL');
            $table->bigInteger('IDLOTE')->unsigned();
            $table->foreign('IDLOTE')->references('IDLOTE')->on('lote');
            $table->bigInteger('IDANIMAL')->unsigned();
            $table->foreign('IDANIMAL')->references('IDANIMAL')->on('animal');
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
        Schema::dropIfExists('lote_animal');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestacao', function (Blueprint $table) {
            $table->id('IDGESTACAO');
            $table->integer('IDANIMAL');
            $table->date('DAINSEMINACAO');
            $table->date('DANASCIMENTOESTIMADO');
            $table->string('TPCUIDADO', 5);
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
        Schema::dropIfExists('gestacao');
    }
}
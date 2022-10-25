<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dieta', function (Blueprint $table) {
            $table->id('IDDIETA');
            $table->string('NMDIETA', 100);
            $table->longText('DSDIETA');
            $table->string('TPUSODIETA', 15);
            $table->bigInteger('IDRACAO')->unsigned()->nullable();
            $table->foreign('IDRACAO')->references('IDRACAO')->on('racao');
            $table->string('FLATIVO', 1);
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
        Schema::dropIfExists('dieta');
    }
}

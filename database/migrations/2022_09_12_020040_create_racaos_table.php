<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racao', function (Blueprint $table) {
            $table->id('IDRACAO');
            $table->string('NMRACAO', 100);
            $table->string('NMFABRICANTE', 100);
            $table->double('QTKG', 15, 2);
            $table->date('DAVALIDADE');
            $table->longText('DSRACAO');
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
        Schema::dropIfExists('racao');
    }
}

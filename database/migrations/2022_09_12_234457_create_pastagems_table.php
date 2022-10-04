<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastagem', function (Blueprint $table) {
            $table->id('IDPASTAGEM');
            $table->string('NMPASTAGEM', 100);
            $table->string('TPCULTURA', 10);
            $table->date('DALIBERACAO');
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
        Schema::dropIfExists('pastagem');
    }
}

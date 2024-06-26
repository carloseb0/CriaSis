<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacinas', function (Blueprint $table) {
            $table->id('IDVACINA');
            $table->string('NMVACINA', 100);
            $table->longText('DSFINALIDADE');
            $table->string('NMFABRICANTE', 100);
            $table->decimal('QTDOSE', $precision = 8, $scale = 2);
            $table->date('DAVALIDADE');
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
        Schema::dropIfExists('vacinas');
    }
}

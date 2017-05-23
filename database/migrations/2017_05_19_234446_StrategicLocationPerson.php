<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StrategicLocationPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('StrategicLocationPerson', function (Blueprint $table) {
        $table->integer('idPerson')->unsigned();
        $table->integer('idWorkStation')->unsigned();
        $table->date('initialDate');
        $table->date('finishDate');

        $table->foreign('idPerson')->references('idPerson')->on('Person');
        $table->foreign('idWorkStation')->references('idWorkStation')->on('WorkStation');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('StrategicLocationPerson');
    }
}

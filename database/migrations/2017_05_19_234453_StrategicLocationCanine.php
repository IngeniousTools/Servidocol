<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StrategicLocationCanine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('StrategicLocationCanine', function (Blueprint $table) {
      $table->integer('idCanine')->unsigned();
      $table->integer('idWorkStation')->unsigned();
      $table->date('initialDate');
      $table->date('finishDate');

      $table->foreign('idCanine')->references('idCanine')->on('Canine');
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
        Schema::dropIfExists('StrategicLocationCanine');
    }
}

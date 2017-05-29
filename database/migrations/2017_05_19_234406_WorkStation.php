<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WorkStation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('WorkStation', function (Blueprint $table) {
        $table->increments('idWorkStation');
        $table->string('name',45);
        $table->integer('idUbicationWork')->unsigned();
        $table->boolean('status');

        $table->foreign('idUbicationWork')->references('idUbicationWork')->on('UbicationWork');

        $table->unique('name');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('WorkStation');
    }
}

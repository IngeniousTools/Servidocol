<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StrategicLocationEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('StrategicLocationEmployee', function (Blueprint $table) {
        $table->integer('idEmployee')->unsigned();
        $table->integer('idWorkStation')->unsigned();
        $table->date('initialDate');
        $table->date('finishDate');

        $table->foreign('idEmployee')->references('idEmployee')->on('Employee');
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
        Schema::dropIfExists('StrategicLocationEmployee');
    }
}

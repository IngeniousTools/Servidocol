<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScheduleEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ScheduleEmployee', function (Blueprint $table) {
        $table->integer('idEmployee')->unsigned();
        $table->date('date');
        $table->time('initialTime');
        $table->time('finishTime');

        $table->foreign('idEmployee')->references('idEmployee')->on('Employee');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ScheduleEmployee');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScheduleCanine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ScheduleCanine', function (Blueprint $table) {
        $table->integer('idCanine')->unsigned();
        $table->time('initialTime');
        $table->time('finishTime');
        $table->date('dayOff');

        $table->foreign('idCanine')->references('idCanine')->on('Canine');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('ScheduleCanine');
    }
}

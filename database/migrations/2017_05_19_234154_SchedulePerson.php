<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SchedulePerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('SchedulePerson', function (Blueprint $table) {
        $table->integer('idPerson')->unsigned();
        $table->date('date');
        $table->time('initialTime');
        $table->time('finishTime');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SchedulePerson');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AreaIncident extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('AreaIncident', function (Blueprint $table) {
        $table->tinyInteger('idAreaIncident')->unsigned();
        $table->string('name',30);
        $table->boolean('status');

        $table->primary('idAreaIncident');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AreaIncident');
    }
}

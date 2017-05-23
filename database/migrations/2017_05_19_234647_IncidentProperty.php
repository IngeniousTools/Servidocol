<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncidentProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('IncidentProperty', function (Blueprint $table) {
        $table->integer('idUser')->unsigned();
        $table->integer('idIncident')->unsigned();
        $table->string('comment',45);

        $table->foreign('idUser')->references('idUser')->on('User');
        $table->foreign('idIncident')->references('idIncident')->on('Incident');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('IncidentProperty');
    }
}

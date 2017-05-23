<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Incident extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Incident', function (Blueprint $table) {
        $table->increments('idIncident');
        $table->tinyInteger('idAreaIncident')->unsigned();
        $table->tinyInteger('idPriority')->unsigned();
        $table->string('userName',45);
        $table->integer('celPhone')->nullable();
        $table->integer('phone')->nullable();
        $table->string('email',40);
        $table->date('date');
        $table->boolean('aprobation');
        $table->boolean('status');

        $table->foreign('idAreaIncident')->references('idAreaIncident')->on('AreaIncident');
        $table->foreign('idPriority')->references('idPriority')->on('Priority');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Incident');
    }
}

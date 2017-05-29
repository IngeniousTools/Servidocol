<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UbicationWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('UbicationWork', function (Blueprint $table) {
        $table->increments('idUbicationWork');
        $table->string('name',40);
        $table->string('location',30);
        $table->integer('phone')->nullable();
        $table->boolean('status');

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
        Schema::dropIfExists('UbicationWork');
    }
}

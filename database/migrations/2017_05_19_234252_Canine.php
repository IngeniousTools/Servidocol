<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Canine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Canine', function (Blueprint $table) {
        $table->increments('idCanine');
        $table->tinyInteger('idBreed')->unsigned();
        $table->integer('plate');
        $table->date('birthDay');
        $table->boolean('status');

        $table->foreign('idBreed')->references('idBreed')->on('Breed');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('Canine');

    }
}

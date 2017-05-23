<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Breed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Breed', function (Blueprint $table) {
        $table->tinyInteger('idBreed')->unsigned();
        $table->string('name',10);
        $table->boolean('status');

        $table->primary('idBreed');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Breed');
    }
}

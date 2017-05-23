<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Person extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Person', function (Blueprint $table) {
        $table->increments('idPerson');
        $table->smallInteger('idJobTitle')->unsigned();
        $table->string('name',40);
        $table->string('lastname',40);
        $table->string('location',35);
        $table->integer('celPhone')->nullable();
        $table->integer('phone')->nullable();
        $table->string('email',50);
        $table->boolean('status');

        $table->foreign('idJobTitle')->references('idJobTitle')->on('JobTitle');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('Person');
    }
}

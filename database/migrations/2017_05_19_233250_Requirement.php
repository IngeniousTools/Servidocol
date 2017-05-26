<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Requirement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Requirement', function (Blueprint $table) {
        $table->increments('idRequirement');
        $table->integer('idEmployee')->unsigned();
        $table->date('date');
        $table->boolean('autorization');
        $table->date('deliveryDate');
        $table->tinyInteger('quantity');

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
      Schema::dropIfExists('Requirement');
    }
}

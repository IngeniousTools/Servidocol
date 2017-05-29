<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Stock', function (Blueprint $table) {
        $table->increments('idStock');
        $table->integer('idBill')->unsigned();
        $table->integer('consecutive');
        $table->boolean('status');

        $table->foreign('idBill')->references('idBill')->on('Bill');

        $table->unique('consecutive');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('Stock');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Element extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Item', function (Blueprint $table) {
        $table->increments('idItem');
        $table->integer('idCategory')->unsigned();
        $table->tinyInteger('idDeposit');
        $table->string('name',20);
        $table->boolean('status');

        $table->foreign('idCategory')->references('idCategory')->on('Category');
        $table->foreign('idDeposit')->references('idDeposit')->on('Deposit');
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Item');
    }
}

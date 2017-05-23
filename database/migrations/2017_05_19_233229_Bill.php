<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Bill', function (Blueprint $table) {
        $table->increments('idBill');
        $table->integer('idItem')->unsigned();
        $table->integer('idBrand')->unsigned();
        $table->integer('price');
        $table->integer('quantity');
        $table->date('dateBuy');

        $table->foreign('idItem')->references('idItem')->on('item');
        $table->foreign('idBrand')->references('idBrand')->on('brand');
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bill');
    }
}

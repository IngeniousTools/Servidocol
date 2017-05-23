<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Customer', function (Blueprint $table) {
        $table->increments('idCustomer');
        $table->tinyInteger('idTypeCustomer')->unsigned();
        $table->integer('idUser')->unsigned();
        $table->string('name',25);
        $table->string('location',30);
        $table->string('observation',200);

        $table->foreign('idTypeCustomer')->references('idTypeCustomer')->on('TypeCustomer');
        $table->foreign('idUser')->references('idUser')->on('User');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Customer');
    }
}

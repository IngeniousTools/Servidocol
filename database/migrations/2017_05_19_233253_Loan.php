<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Loan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Loan', function (Blueprint $table) {
        $table->integer('idRequirement')->unsigned();
        $table->integer('idStock')->unsigned();
        $table->date('autorizationDate')->nullable();

        $table->foreign('idRequirement')->references('idRequirement')->on('Requirement');
        $table->foreign('idStock')->references('idStock')->on('Stock');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Loan');
    }
}

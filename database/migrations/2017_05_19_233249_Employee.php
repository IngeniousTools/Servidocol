<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Employee', function (Blueprint $table) {
        $table->integer('idEmployee')->unsigned();
        $table->smallInteger('idJobTitle')->unsigned();
        $table->string('name',40);
        $table->string('lastname',40);
        $table->string('location',35);
        $table->bigInteger('celPhone')->nullable();
        $table->bigInteger('phone')->nullable();
        $table->string('email',50);
        $table->boolean('status');

        $table->primary('idEmployee');
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
      Schema::dropIfExists('Employee');
    }
}

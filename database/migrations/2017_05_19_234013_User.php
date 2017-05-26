<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('User', function (Blueprint $table) {
        $table->increments('idUser');
        $table->integer('idEmployee')->unsigned();
        $table->smallInteger('idRol')->unsigned();
        $table->string('password',200);
        $table->boolean('status');

        $table->foreign('idEmployee')->references('idEmployee')->on('Employee');
        $table->foreign('idRol')->references('idRol')->on('rol');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('User');
    }
}

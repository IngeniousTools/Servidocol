<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Priority extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Priority', function (Blueprint $table) {
        $table->tinyInteger('idPriority')->unsigned();
        $table->string('name',30);
        $table->boolean('status');

        $table->primary('idPriority');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Priority');
    }
}

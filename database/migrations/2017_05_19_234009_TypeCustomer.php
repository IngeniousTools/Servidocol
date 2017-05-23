<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TypeCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('TypeCustomer', function (Blueprint $table) {
        $table->tinyInteger('idTypeCustomer')->unsigned();
        $table->string('name',30);
        $table->boolean('status');

        $table->Primary('idTypeCustomer');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TypeCustomer');
    }
}

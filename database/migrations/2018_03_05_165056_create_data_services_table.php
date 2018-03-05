<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',999);
            $table->string('userid',999);
            $table->string('password',999);
            $table->string('urlauthorization',999);
            $table->string('active',999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_services');
    }
}

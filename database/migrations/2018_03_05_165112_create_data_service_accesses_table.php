<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataServiceAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_service_accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dataserviceid');
            $table->string('servicetype',999);
            $table->string('serviceurl',999);
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
        Schema::dropIfExists('data_service_accesses');
    }
}

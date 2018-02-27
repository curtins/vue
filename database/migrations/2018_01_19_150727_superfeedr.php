<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class Superfeedr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superfeedrs', function (Blueprint $table) {
            
            $table->increments('id');           
            $table->string('endpoint');
            $table->string('format');
            $table->string('title')->nullable();
            $table->string('url');
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
        Schema::dropIfExists('superfeedrs');
    }
}

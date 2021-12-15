<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWahanaImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wahana_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wahana_id');
            $table->string('images');
            $table->timestamps();
            
            $table->foreign('wahana_id')->references('id')->on('wahana')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wahana_images');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWahanaReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wahana_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wahana_id');
            $table->unsignedBigInteger('user_id');
            $table->longText('review');
            $table->float('rating');
            $table->timestamps();

            $table->foreign('wahana_id')->references('id')->on('wahana')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wahana_reviews');
    }
}

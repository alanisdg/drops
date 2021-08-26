<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swipes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('swiper_id');
            $table->foreign('swiper_id')->references('id')->on('users');

            $table->unsignedBigInteger('target_id');
            $table->foreign('target_id')->references('id')->on('users');

            $table->integer('swipe');

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
        Schema::dropIfExists('swipes');
    }
}

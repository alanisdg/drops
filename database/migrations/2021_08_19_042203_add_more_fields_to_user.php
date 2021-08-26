<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birthday')->nullable();
            $table->integer('smoke')->nullable();
            $table->integer('new_user')->default(0);
            $table->integer('drink')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('civil')->nullable();
            $table->integer('wants')->nullable();
            $table->integer('studies')->nullable();
            $table->integer('have_kids')->nullable();
            $table->integer('want_kids')->nullable();
            $table->integer('religion')->nullable();
            $table->integer('income')->nullable();
            $table->integer('type_of_music')->nullable();
            $table->integer('country')->nullable();
            $table->foreignId('estado_id')->nullable()->constrained();
            $table->integer('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}

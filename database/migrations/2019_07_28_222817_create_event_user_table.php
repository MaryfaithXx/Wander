<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_user', function (Blueprint $table) {
      $table->bigIncrements('id');
			$table->unsignedBigInteger('event_id')->nullable();
			$table->foreign('event_id')->references('id')->on('events');
			$table->unsignedBigInteger('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('event_user');
    }
}

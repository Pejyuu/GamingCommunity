<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
      {
        Schema::create('event_user', function(Blueprint $table)
        {
            $table->integer('id')->unique();
            $table->integer('event_id')->unsigned()->nullable();
            $table->foreign('event_id')->references('id')
                  ->on('events')->onDelete('cascade');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                  ->on('users')->onDelete('cascade');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookedFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_flights', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('travellers');
          $table->string('meal')->nullable();
          $table->string('seat')->nullable();
          $table->string('price');
          $table->unsignedBigInteger('user_id');
          $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade');
          $table->unsignedBigInteger('flight_id');
          $table->foreign('flight_id')->references('id')
                ->on('flights')
                ->onDelete('cascade');
          $table->string('ticket_number')->nullable();
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
        Schema::dropIfExists('booked_flights');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('from');
            $table->string('to');
            $table->string('depart_date');
            $table->string('depart_time');
            $table->string('arrival');
            $table->string('seats');
            $table->string('price');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->string('flight_number');
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
        Schema::dropIfExists('flights');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDeleteCascade();
            $table->dateTime('check_in_date_time')->nullable();
            $table->dateTime('check_out_date_time')->nullable();
            $table->string('booking_type'); //online offline
            $table->string('duration');
            $table->json('rooms')->nullable();
            $table->string('payment_type')->nullable(); //cash, card, transfer
            $table->integer('no_of_adult');
            $table->integer('no_of_children');
            $table->integer('no_of_rooms');
            $table->double('total_cost');
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
        Schema::dropIfExists('bookings');
    }
}
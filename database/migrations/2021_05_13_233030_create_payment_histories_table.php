<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_no');
            $table->string('gender');
            $table->json('rooms')->nullable();
            $table->string('no_of_rooms');
            $table->string('no_of_adult');
            $table->string('no_of_children');
            $table->string('check_in_date');
            $table->date('check_out_date');
            $table->string('duration');
            $table->string('total_cost');
            $table->string('paid_amount');
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
        Schema::dropIfExists('payment_histories');
    }
}
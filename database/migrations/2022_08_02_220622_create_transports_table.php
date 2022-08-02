<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('type');
            $table->string('price_per_day');
            $table->string('booking_date');
            $table->string('no_of_days');
            $table->double('amount');
            $table->string('user_name');
            $table->string('email');
            $table->string('mobile');
            $table->boolean('payment')->default(false);
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
        Schema::dropIfExists('transports');
    }
}

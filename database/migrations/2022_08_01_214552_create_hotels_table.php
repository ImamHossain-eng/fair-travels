<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->string('hotel_type');
            $table->string('room_type');
            $table->integer('price_per_room');
            $table->integer('no_of_room');
            $table->date('check_in');
            $table->date('check_out');
            $table->double('amount');
            $table->string('user_name');
            $table->string('email');
            $table->double('mobile');
            $table->boolean('payment');
            $table->softdeletes();
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
        Schema::dropIfExists('hotels');
    }
}

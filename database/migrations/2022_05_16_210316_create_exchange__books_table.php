<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange__books', function (Blueprint $table) {
            $table->id();
            $table->integer('exchange_id');
            $table->string('type');
            $table->double('amount', 8, 2);
            $table->double('bdt_amount', 8, 2);
            $table->integer('mobile');
            $table->string('email');
            $table->boolean('status')->default(false);
            $table->softDeletes();            
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
        Schema::dropIfExists('exchange__books');
    }
}

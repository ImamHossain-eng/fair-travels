<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id');
            $table->integer('adult');
            $table->integer('children')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('street');
            $table->string('city');
            $table->string('zip')->nullable();
            $table->string('country');
            $table->integer('amount');
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
        Schema::dropIfExists('books');
    }
}

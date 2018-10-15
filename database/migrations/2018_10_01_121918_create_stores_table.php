<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner_name');
            $table->string('email')->unique();
            $table->string('store_name');
            $table->string('location');
            $table->string('citizionship');
            $table->string('contact');
            $table->string('profession');
            $table->string('images')->nullable();
            $table->string('verifyToken')->nullable();
            $table->boolean('status')->default('0');
            $table->boolean('display')->default('1');
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
        Schema::dropIfExists('stores');
    }
}

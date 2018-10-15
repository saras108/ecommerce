<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('email')->unique();
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
        Schema::dropIfExists('owner_lists');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroughtItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brought_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('address');
            $table->string('items');
            $table->string('total');
            $table->string('vat');
            $table->string('sumtotal');
            $table->string('booked_location')->nullable;
            $table->string('booked_ip')->nullable;

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
        Schema::dropIfExists('brought_items');
    }
}

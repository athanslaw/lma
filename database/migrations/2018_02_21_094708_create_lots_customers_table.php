<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots_customer', function (Blueprint $table) {
            $table->increments('id')->unique();
			$table->integer('product_id');
            $table->integer('customer_id');
            $table->integer('farmer_id');
            $table->integer('state');
            $table->integer('lga');
            $table->integer('address');
            $table->integer('product_lot_size');
            $table->timestamp('date_booked');
            $table->string('status');
            $table->integer('delivery_period');
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
        Schema::dropIfExists('lots_customer');
    }
}

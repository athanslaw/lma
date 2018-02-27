<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots_farmer', function (Blueprint $table) {
            $table->increments('id')->unique();
			$table->integer('product_id');
            $table->integer('customer_id');
            $table->integer('farmer_id');
            $table->integer('cc_id');
            $table->integer('product_lot_size');
            $table->timestamp('date_posted');
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
        Schema::dropIfExists('lots_farmer');
    }
}

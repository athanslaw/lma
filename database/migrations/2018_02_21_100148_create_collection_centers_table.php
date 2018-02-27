<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_centers', function (Blueprint $table) {
            $table->increments('cc_id')->unique();
			$table->string('cc_name');
			$table->string('village');
			$table->integer('lga');
			$table->integer('state');
			$table->integer('country');
			$table->tinyInteger('status');
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
        Schema::dropIfExists('collection_centers');
    }
}

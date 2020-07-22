<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->text('description')->nullable();
			$table->string('phone_number', 30);
			$table->string('address', 200);
            $table->integer('type')->unsigned();
            $table->string('image')->nullable(); // our  image field
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
        Schema::dropIfExists('restaurants');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrripPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('tour_highlights_title');
            $table->string('tour_highlights_description');
            $table->integer('no_of_day');
            $table->integer('no_of_night');
            $table->string('address');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('location');
            $table->string('food');
            $table->string('sightseeing_title');
            $table->string('sightseeing_desc');
            $table->string('sightseeing_img');
            $table->string('other_desc');
            $table->integer('theme_id');
            $table->string('type');
            $table->integer('discount');
            $table->string('hotel_type');
            $table->integer('actual_price');
            $table->integer('discounted_price');
            $table->string('tour_journey');
            $table->string('pay_and_hold');
            $table->integer('ecash');
            $table->string('sub_discription');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_packages');
    }
}
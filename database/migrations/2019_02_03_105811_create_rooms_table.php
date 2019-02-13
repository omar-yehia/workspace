<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('room_id');

            $table->unsignedInteger('space_id');
            $table->foreign('space_id')->references('space_id')->on('spaces')->onDelete('cascade');;

            $table->string('room_name');
            $table->integer('available_chairs');
            $table->integer('chair_price_per_hour');
            $table->string('room_image_path');
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
        Schema::dropIfExists('rooms');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->increments('space_id');

            $table->unsignedInteger('owner_user_id');
            $table->foreign('owner_user_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->string('space_name');
            $table->string('space_city');
            $table->string('space_address');
            $table->integer('space_number_of_rooms');
            $table->string('space_image_path');
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
        Schema::dropIfExists('spaces');
    }
}

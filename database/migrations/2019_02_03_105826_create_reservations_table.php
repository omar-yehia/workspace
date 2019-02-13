<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function (Blueprint $table) {
			$table->increments('reservation_id');

			$table->unsignedInteger('space_id');
			$table->unsignedInteger('room_id');
			$table->unsignedInteger('user_id');

			$table->foreign('space_id')->references('space_id')->on('spaces')->onDelete('cascade');;
			$table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');;
			$table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');;

			$table->date('reservation_date');
			$table->integer('reservation_from_hour');
			$table->integer('reservation_to_hour');
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
		Schema::dropIfExists('reservations');
	}
}

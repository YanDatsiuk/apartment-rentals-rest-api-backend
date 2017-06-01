<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booking_statuses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('booking_id')->unsigned()->nullable()->unique('booking_id_UNIQUE');
			$table->integer('status_id')->unsigned()->nullable()->index('index3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('booking_statuses');
	}

}

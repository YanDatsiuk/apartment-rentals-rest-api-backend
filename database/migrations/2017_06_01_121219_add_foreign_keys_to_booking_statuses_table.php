<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookingStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('booking_statuses', function(Blueprint $table)
		{
			$table->foreign('booking_id', 'fk_booking_statuses_1')->references('id')->on('bookings')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('status_id', 'fk_booking_statuses_2')->references('id')->on('statuses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('booking_statuses', function(Blueprint $table)
		{
			$table->dropForeign('fk_booking_statuses_1');
			$table->dropForeign('fk_booking_statuses_2');
		});
	}

}

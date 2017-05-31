<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bookings', function(Blueprint $table)
		{
			$table->foreign('appartment_id', 'fk_bookings_1')->references('id')->on('apartments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('guest_id', 'fk_bookings_2')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('status_id', 'fk_bookings_3')->references('id')->on('booking_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bookings', function(Blueprint $table)
		{
			$table->dropForeign('fk_bookings_1');
			$table->dropForeign('fk_bookings_2');
			$table->dropForeign('fk_bookings_3');
		});
	}

}

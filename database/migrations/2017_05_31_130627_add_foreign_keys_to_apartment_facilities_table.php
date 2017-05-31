<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToApartmentFacilitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('apartment_facilities', function(Blueprint $table)
		{
			$table->foreign('apartment_id', 'fk_apartment_facilities_1')->references('id')->on('apartments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('facility_id', 'fk_apartment_facilities_2')->references('id')->on('facilities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('apartment_facilities', function(Blueprint $table)
		{
			$table->dropForeign('fk_apartment_facilities_1');
			$table->dropForeign('fk_apartment_facilities_2');
		});
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApartmentFacilitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apartment_facilities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('apartment_id')->unsigned()->nullable()->index('index2');
			$table->integer('facility_id')->unsigned()->nullable()->index('index3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('apartment_facilities');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToApartmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('apartments', function(Blueprint $table)
		{
			$table->foreign('building_id', 'fk_apartments_1')->references('id')->on('buildings')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('type_id', 'fk_apartments_2')->references('id')->on('apartment_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('apartments', function(Blueprint $table)
		{
			$table->dropForeign('fk_apartments_1');
			$table->dropForeign('fk_apartments_2');
		});
	}

}

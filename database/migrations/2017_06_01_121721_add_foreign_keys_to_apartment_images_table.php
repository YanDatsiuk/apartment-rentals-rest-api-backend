<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToApartmentImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('apartment_images', function(Blueprint $table)
		{
			$table->foreign('apartment_id', 'fk_apartment_images_1')->references('id')->on('apartments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('image_id', 'fk_apartment_images_2')->references('id')->on('images')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('apartment_images', function(Blueprint $table)
		{
			$table->dropForeign('fk_apartment_images_1');
			$table->dropForeign('fk_apartment_images_2');
		});
	}

}

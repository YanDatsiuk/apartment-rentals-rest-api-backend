<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApartmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apartments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('building_id')->unsigned()->nullable()->index('index2');
			$table->integer('type_id')->unsigned()->nullable()->index('index3');
			$table->integer('bathroom_quantity')->nullable()->index('index4');
			$table->integer('bedroom_quantity')->nullable()->index('index5');
			$table->integer('room_quantity')->nullable()->index('index6');
			$table->string('description', 2000)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('apartments');
	}

}

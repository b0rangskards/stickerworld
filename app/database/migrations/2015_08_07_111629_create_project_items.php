<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('proj_id')->unsigned();
			$table->integer('item_id')->unsigned();
			$table->integer('quantity')->unsigned();
			$table->decimal('unit_price');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_items');
	}

}

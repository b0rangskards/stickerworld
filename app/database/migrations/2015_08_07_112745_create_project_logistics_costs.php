<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectLogisticsCosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_logistics_costs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('proj_id')->unsigned();
			$table->integer('utility_id')->unsigned();
			$table->smallInteger('no_of_deliveries')->unsigned();
			$table->decimal('rate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_logistics_costs');
	}

}

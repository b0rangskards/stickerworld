<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectLaborCosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_labor_costs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('proj_id')->unsigned();
			$table->integer('utility_id')->unsigned();
			$table->decimal('rate');
			$table->smallInteger('no_of_emp');
			$table->smallInteger('no_of_days');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_labor_costs');
	}

}

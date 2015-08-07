<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectGeneratedCosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_generated_costs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('sub_total_cost');
			$table->decimal('standard_materials_cost');
			$table->float('cost_multiplier');
			$table->tinyInteger('vat_rate');
			$table->tinyInteger('contingencies');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_generated_costs');
	}

}

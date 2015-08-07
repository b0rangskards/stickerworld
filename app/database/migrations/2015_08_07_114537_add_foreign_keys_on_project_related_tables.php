<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysOnProjectRelatedTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function(Blueprint $table)
		{
			$table->foreign('cl_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('br_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('estimator_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('salesrep_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('projgencost_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::table('project_items', function (Blueprint $table) {
			$table->foreign('proj_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::table('project_labor_costs', function (Blueprint $table) {
			$table->foreign('proj_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('utility_id')->references('id')->on('utility_costs')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::table('project_logistics_costs', function (Blueprint $table) {
			$table->foreign('proj_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('utility_id')->references('id')->on('utility_costs')->onDelete('cascade')->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('projects', function(Blueprint $table)
		{
			$table->dropForeign('projects_cl_id_foreign');
			$table->dropForeign('projects_br_id_foreign');
			$table->dropForeign('projects_estimator_id_foreign');
			$table->dropForeign('projects_salesrep_id_foreign');
			$table->dropForeign('projects_projgencost_id_foreign');
		});

		Schema::table('project_items', function (Blueprint $table) {
			$table->dropForeign('project_items_proj_id_foreign');
			$table->dropForeign('project_items_item_id_foreign');
		});

		Schema::table('project_labor_costs', function (Blueprint $table) {
			$table->dropForeign('project_labor_costs_proj_id_foreign');
			$table->dropForeign('project_labor_costs_utility_id_foreign');
		});

		Schema::table('project_logistics_costs', function (Blueprint $table) {
			$table->dropForeign('project_logistics_costs_proj_id_foreign');
			$table->dropForeign('project_logistics_costs_utility_id_foreign');
		});
	}

}

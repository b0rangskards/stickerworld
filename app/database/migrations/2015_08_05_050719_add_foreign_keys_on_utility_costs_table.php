<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysOnUtilityCostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('utility_costs', function(Blueprint $table)
		{
			$table->foreign('br_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('utility_costs', function(Blueprint $table)
		{
			$table->dropForeign('utility_costs_br_id_foreign');
		});
	}

}

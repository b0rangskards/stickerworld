<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUtilityCostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('utility_costs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('br_id')->unsigned()->index();
			$table->string('classification', 20);
			$table->string('type', 50);
			$table->decimal('rate');
			$table->text('remarks')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('utility_costs');
	}

}

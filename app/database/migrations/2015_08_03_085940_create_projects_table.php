<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cl_id')->unsigned()->index();
			$table->integer('br_id')->unsigned()->index();
			$table->integer('estimator_id')->unsigned();
			$table->integer('salesrep_id')->unsigned();
			$table->string('name', 100);
			$table->string('location')->nullable();
			$table->date('project_date');
			$table->date('deadline');
			$table->integer('lead_time_days')->unsigned();
			$table->integer('projgencost_id')->unsigned()->nullable();
			$table->boolean('is_approved')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}

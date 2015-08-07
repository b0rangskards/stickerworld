<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('br_id')->unsigned()->index();
			$table->string('name', 100);
			$table->string('address', 100);
			$table->string('contact_no', 50);
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('br_id')->references('id')->on('branches')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}

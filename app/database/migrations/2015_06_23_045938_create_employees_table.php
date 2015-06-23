<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('br_id')->unsigned()->index();
            $table->integer('dept_id')->unsigned()->index();
            $table->string('firstname', 100);
            $table->string('middlename', 100)->nullable();
            $table->string('lastname', 100);
            $table->string('designation', 100);
            $table->string('address', 200)->nullable();
            $table->string('contact_no', 100)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('recstat', 1)->default('A');

            $table->foreign('br_id')->references('id')->on('branches');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('dept_id')->references('id')->on('departments');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}

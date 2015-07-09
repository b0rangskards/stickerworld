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
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->integer('br_id')->unsigned()->index();
            $table->integer('dept_id')->unsigned()->nullable()->index();
            $table->string('firstname', 50);
            $table->string('middlename', 50)->nullable();
            $table->string('lastname', 50);
            $table->date('birthdate');
            $table->string('gender', 6);
            $table->string('address', 100)->nullable();
            $table->string('contact_no', 50)->nullable();
            $table->string('picture')->nullable();
            $table->string('designation', 20);
            $table->date('hired_date');
            $table->date('terminated_date')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('recstat', 1)->default('A');

            $table->foreign('br_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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

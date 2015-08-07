<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysOnEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('employees', function(Blueprint $table)
		{
            $table->foreign('br_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('dept_id')->references('id')->on('departments')->onDelete('set null')->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('employees', function(Blueprint $table)
		{
            $table->dropForeign('employees_br_id_foreign');
            $table->dropForeign('employees_user_id_foreign');
            $table->dropForeign('employees_dept_id_foreign');
        });
	}

}

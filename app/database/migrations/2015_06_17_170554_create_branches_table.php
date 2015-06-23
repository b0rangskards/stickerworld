<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('contact_no', 200);
            $table->string('address', 200);
            $table->decimal('lat', 10, 6);
            $table->decimal('lng', 10, 6);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('recstat', 1)->default('A');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('branches');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('supplier_id')->unsigned()->index();
			$table->string('name', 100);
			$table->string('type', 20);
			$table->string('unit_of_measure', 20);
			$table->decimal('unit_price');
			$table->text('image')->nullable();
			$table->text('details')->nullable();
			$table->string('remarks')->nullable();
			$table->boolean('is_sm')->default(0);
			$table->timestamps();
			$table->char('recstat')->default('A');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}

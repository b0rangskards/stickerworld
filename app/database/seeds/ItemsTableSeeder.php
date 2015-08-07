<?php

use Laracasts\TestDummy\Factory;

class ItemsTableSeeder extends MasterTableSeeder{

	public function run()
	{
		$supplierIds = Supplier::lists('id');

		foreach(range(1, 100) as $index)
		{
			$itemData = Factory::create('Item',[
				'supplier_id' => $this->faker->randomElement($supplierIds)
			]);
		}
	}

	public function createSlug()
	{
		// TODO: Implement createSlug() method.
	}
}
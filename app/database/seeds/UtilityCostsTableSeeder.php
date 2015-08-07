<?php

class UtilityCostsTableSeeder extends MasterTableSeeder {

	public function run()
	{
		$utilities_costs = [
			/* Labor Costs */
			['br_id' => 1, 'classification' => Config::get('constants.CLASS_LABOR'), 'type' => 'fabrication', 'rate' => 328.00],
			['br_id' => 1, 'classification' => Config::get('constants.CLASS_LABOR'), 'type' => 'paint', 'rate' => 328.00],
			['br_id' => 1, 'classification' => Config::get('constants.CLASS_LABOR'), 'type' => 'installation', 'rate' => 328.00],
			/* Logistics Costs */
			['br_id' => 1, 'classification' => Config::get('constants.CLASS_LOGISTICS'), 'type' => 'delivery-motorcycle', 'rate' => 250.00],
			['br_id' => 1, 'classification' => Config::get('constants.CLASS_LOGISTICS'), 'type' => 'delivery-multicab', 'rate' => 500.00],
			['br_id' => 1, 'classification' => Config::get('constants.CLASS_LOGISTICS'), 'type' => 'delivery-truck', 'rate' => 1200.00],
			['br_id' => 1, 'classification' => Config::get('constants.CLASS_LOGISTICS'), 'type' => 'shipping', 'rate' => 1500.00, 'remarks' => 'ship from cebu to tagbilaran, bohol via jrs express']
		];

		foreach($utilities_costs as $utility)
		{
			UtilityCost::create($utility);
		}
	}

	public function createSlug()
	{
		// TODO: Implement createSlug() method.
	}
}
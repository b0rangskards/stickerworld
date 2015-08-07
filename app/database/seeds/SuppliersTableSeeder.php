<?php

use Laracasts\TestDummy\Factory;

class SuppliersTableSeeder extends MasterTableSeeder {

    private $branch_ids;

	public function run()
	{
		//create one for manager
		$managerBrId = User::where('username', 'manager')->first()->employee->br_id;

		Factory::create('Supplier', [
			'br_id' => $managerBrId
		]);

		$this->branch_ids = Branch::lists('id');

		foreach(range(1, 10) as $index)
		{
			$supplier = Supplier::create($this->createSlug());

            $supplier->contacts()->create([
                'number'    =>      $this->faker->unique(true, 100000)->phoneNumber,
                'type'      =>      $this->faker->randomElement(Config::get('enums.contact_type'))
            ]);
        }
	}

    public function createSlug()
    {
        return [
            'br_id' => $this->faker->randomElement($this->branch_ids),
            'name' => $this->faker->unique(true, 100000)->company,
            'type' => $this->faker->randomElement(Config::get('enums.supplier_type')),
            'address' => $this->faker->unique(true, 100000)->address,
            'email' => $this->faker->unique(true, 100000)->companyEmail
        ];
    }
}
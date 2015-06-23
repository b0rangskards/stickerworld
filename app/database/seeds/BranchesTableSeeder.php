<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BranchesTableSeeder extends MasterTableSeeder {

	public function run()
	{
        $branches = [];

		foreach(range(1, 5) as $index)
		{
			$branches[] = $this->createSlug();
		}

        Branch::insert($branches);
	}

    public function createSlug()
    {
        return [
            'name'       => $this->faker->city,
            'contact_no' => $this->faker->phoneNumber,
            'address'    => $this->faker->address,
            'lat'        => $this->faker->latitude,
            'lng'        => $this->faker->longitude,
            'recstat'    => 'A'
        ];
    }

}
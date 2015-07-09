<?php

use Laracasts\TestDummy\Factory;

class EmployeesTableSeeder extends MasterTableSeeder {

    public function run()
	{
        $deptIDs = Department::lists('id');

        foreach(range(1, 20) as $index) {

            $deptId = $this->faker->randomElement($deptIDs);

            Factory::create('Employee', [
                'dept_id' => $deptId
            ]);
        }

        foreach(range(1,10) as $index) {
            $id = $this->faker->randomElement($deptIDs);
            Factory::create('Employee',
                [
                    'user_id' => null,
                    'dept_id' => $id
                ]
            );
        }
	}

    public function createSlug()
    {
        // TODO: Implement createSlug() method.
    }
}
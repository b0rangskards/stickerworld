<?php

use Laracasts\TestDummy\Factory;

class EmployeesTableSeeder extends MasterTableSeeder {

    public function run()
	{
        foreach(range(1, 20) as $index) {
            Factory::create('Employee');
        }
	}

    public function createSlug()
    {
        // TODO: Implement createSlug() method.
    }
}
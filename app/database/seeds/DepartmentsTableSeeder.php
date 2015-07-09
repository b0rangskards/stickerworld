<?php

class DepartmentsTableSeeder extends MasterTableSeeder {

    private static $departments = [
        'Accounting',
        'Sales',
        'IT & Design',
        'Production',
        'Logistics'
    ];

	public function run()
	{
        foreach ( self::$departments as $dept ) {
            Department::create([
                'name' => $dept
            ]);
        }
	}

    public function createSlug()
    {
        // TODO: Implement createSlug() method.
    }
}
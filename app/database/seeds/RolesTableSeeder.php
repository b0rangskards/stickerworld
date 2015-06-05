<?php 

class RolesTableSeeder extends MasterSeeder
{

    private static $roles = [
        'Admin',
        'Moderator',
        'Estimator',
        'Accountant'
    ];

    public function run()
    {
        /* Create admin account */

        foreach(static::$roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }

    }

    public function createSlug()
    {
        // TODO: Implement createSlug() method.
    }
}
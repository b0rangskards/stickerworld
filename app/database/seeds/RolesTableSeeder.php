<?php 

class RolesTableSeeder extends MasterTableSeeder
{

    private static $roles = [
        'admin',
        'moderator',
        'manager',
        'estimator',
        'accountant'
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
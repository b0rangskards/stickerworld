<?php 

class RolesTableSeeder extends MasterTableSeeder
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
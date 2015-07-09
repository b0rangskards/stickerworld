<?php

use Carbon\Carbon;
use Laracasts\TestDummy\Factory;

class UsersTableSeeder extends MasterTableSeeder
{

    public function run()
    {
        /* Create admin account */
        User::create([
            'role_id'   => 1,
            'username'  => 'admin',
            'password'  => '1234',
            'email'     => 'admin@gmail.com',
            'last_login'=> Carbon::now(),
            'recstat'   => 'A'
        ]);

        /* Create moderator account */
        User::create([
            'role_id' => 2,
            'username' => 'moderator',
            'password' => '1234',
            'email' => 'moderator@gmail.com',
            'last_login' => Carbon::now(),
            'recstat' => 'A'
        ]);



        /* Create manager account */
        $manager = Factory::create('User',
            [
                'role_id' => 3,
                'username' => 'manager',
                'password' => '1234',
                'email' => 'manager@gmail.com',
                'last_login' => Carbon::now(),
                'recstat' => 'A'
            ]
        );

        $departmentIDs = Department::lists('id');

        Factory::create('Employee',
            [
                'user_id' => $manager->id,
                'dept_id' => $this->faker->randomElement($departmentIDs)
            ]
        );

        foreach ( range(1, 10) as $index ) {
            $this->createSlug();
        }
    }

    public function createSlug()
    {
        $activation_code = str_random(20);
        $activation_select = $this->faker->randomElement([null, $activation_code]);

        Factory::create('User', [
            'password' => '1234',
            'activation_code' => $activation_select,
            'last_login' => (is_null($activation_select) ? $this->faker->dateTimeBetween('-2 weeks') : null),
            'recstat' => (is_null($activation_select) ? 'A' : 'I')
        ]);
    }

}
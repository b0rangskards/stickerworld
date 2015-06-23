<?php

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
            'recstat'   => 'A'
        ]);

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
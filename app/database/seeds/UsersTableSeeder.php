<?php

class UsersTableSeeder extends MasterSeeder
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

        $users = [];
        foreach ( range(1, 10) as $index ) {
            $users[] = $this->createSlug();
        }
        User::insert($users);
    }

    public function createSlug()
    {
        $roles = Role::lists('id');
        $activation_code = str_random(20);
        $activation_select = $this->faker->randomElement([null, $activation_code]);

        return [
            'role_id'  => $this->faker->randomElement($roles),
            'username' => $this->faker->userName,
            'password' => '1234',
            'email'    => $this->faker->email,
            'activation_code' => $activation_select,
            'recstat'  => is_null($activation_select) ? 'A' : 'I'
        ];
    }

}
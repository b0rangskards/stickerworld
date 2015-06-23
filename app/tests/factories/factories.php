<?php
$ptBRFaker = Faker\Factory::create('pt_BR');

$factory('User', [
  'role_id'     => $faker->numberBetween(1, 4),
  'username'    => $faker->userName,
  'password'    => '1234',
  'email'       => $faker->email,
  'recstat'     => 'I'
]);

$factory('Branch', [
  'name'       => $faker->city,
  'contact_no' => '1231324',
  'address'    => $faker->address,
  'lat'        => $faker->latitude,
  'lng'        => $faker->longitude,
  'recstat'    => 'A'
]);

$factory('Department', [
    'name'     => $faker->companySuffix
]);

$designation = ['CEO', 'Office Manager', 'Office Clerk', 'Accountant', 'Estimator', 'Production Worker', 'Driver', 'Janitor'];

$factory('Employee', [
    'user_id'       => 'factory:User',
    'br_id'         => 'factory:Branch',
    'dept_id'       => 'factory:Department',
    'firstname'     => $faker->firstName,
    'middlename'    => $faker->lastName,
    'lastname'      => $faker->lastName,
    'designation'   => $faker->randomElement($designation),
    'address'       => $faker->address,
    'contact_no'    => $ptBRFaker->cellphoneNumber
]);

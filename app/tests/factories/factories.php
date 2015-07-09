<?php
$ptBRFaker = Faker\Factory::create('pt_BR');

$factory('Role', [
    'name' => $faker->unique(true, 100000)->domainWord,
    'description' => $faker->sentence(8)
]);

$factory('User', [
  'role_id'     => $faker->numberBetween(3, 5),
  'username'    => $faker->unique(true, 100000)->userName,
  'password'    => '1234',
  'email'       => $faker->unique(true, 100000)->email,
  'recstat'     => 'I'
]);

/* Admin User */
$factory('User', 'admin_user', [
    'role_id' => 1,
    'username' => 'user_admin',
    'password' => '1234',
    'email' => 'user_admin@gmail.com',
    'recstat' => 'A'
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
    'name'     => $faker->unique(true, 100000)->companySuffix
]);

$designation = ['CEO', 'Office Manager', 'Office Clerk', 'Accountant', 'Estimator', 'Production Worker', 'Driver', 'Janitor'];
$departmentIDs = Department::lists('id');

$factory('Employee', [
    'user_id'       => 'factory:User',
    'br_id'         => 'factory:Branch',
    'dept_id'       => $faker->randomElement($departmentIDs),
    'firstname'     => $faker->unique(true, 100000)->firstName,
    'middlename'    => $faker->unique(true, 100000)->lastName,
    'lastname'      => $faker->unique(true, 100000)->lastName,
    'birthdate'     => $faker->date('Y-m-d'),
    'gender'        => $faker->randomElement(['male', 'female']),
    'address'       => $faker->unique(true, 100000)->address,
    'contact_no'    => $ptBRFaker->cellphoneNumber,
    'designation'   => $faker->randomElement($designation),
    'hired_date'    => $faker->date('Y-m-d', 'now')
]);

$factory('PermissionGroup', [
   'name'           => $faker->unique(true,100000)->sentence(3)
]);

$factory('Permission', [
    'group_id'      => 'factory:PermissionGroup',
    'name'          => $faker->unique(true, 100000)->sentence(3),
    'route'         => $faker->unique(true, 100000)->word,
    'description'   => $faker->sentence
]);

$factory('PermissionRole', [
    'permission_id' => 'factory:Permission',
    'role_id'       => 'factory:Role'
]);

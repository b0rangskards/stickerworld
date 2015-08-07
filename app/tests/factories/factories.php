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

$randNum = $faker->randomNumber(5);

$factory('Branch', [
  'name'       => $faker->unique(true, 100000)->city,
  'contact_no' => $faker->unique(true, 100000)->phoneNumber,
  'address'    => $faker->unique(true, 100000)->address,
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

$factory('Contact', [
    'number' => $faker->unique(true, 100000)->phoneNumber,
    'type'   => $faker->randomElement(Config::get('enums.contact_type'))
]);

$factory('Supplier', [
	'br_id' => 'factory:Branch',
	'name' => $faker->unique(true, 100000)->company,
	'type' => $faker->randomElement(Config::get('enums.supplier_type')),
	'address' => $faker->unique(true, 100000)->address,
	'email' => $faker->unique(true, 100000)->companyEmail
]);

$factory('Item', function($faker) {
	$itemType = $faker->randomElement(Config::get('enums.item_type'));
	$unitOfMeasure = $faker->randomElement(Config::get('enums.unit_of_measure'));

	$remarks['color'] = $faker->colorName;
	$remarks['size'] = $faker->phoneNumber;

	$sm = ['checked', ''];

	return [
		'supplier_id'     => 'factory:Supplier',
		'name'            => $faker->unique(true, 100000)->name,
		'details'         => $faker->sentence(),
		'type'            => $itemType,
		'unit_of_measure' => $unitOfMeasure,
		'unit_price'      => $faker->randomFloat(2, 20, 2000),
		'remarks'         => $faker->randomElement($remarks),
		'is_sm'           => $faker->randomElement($sm)
	];
});

$factory('Client', function($faker) use($ptBRFaker)
{
	$name = [$faker->unique(true, 100000)->name, $faker->unique(true, 10000)->company];

	return [
		'br_id' => 'factory:Branch',
		'name'    => $faker->randomElement($name),
		'address' => $faker->unique(true, 100000)->address,
		'contact_no' => $ptBRFaker->cellphoneNumber
	];
});

$factory('UtilityCost', 'labor_cost', function ($faker) {
	$types = ['fabrication', 'painting works', 'installation'];
	return [
		'br_id' => 'factory:Branch',
		'classification' => Config::get('constants.CLASS_LABOR'),
		'type' => $faker->randomElement($types),
		'rate' => $faker->randomFloat(2, 250, 500),
		'remarks' => $faker->sentence()
	];
});

$factory('UtilityCost', 'logistics_cost', function ($faker) {
	$types = ['delivery-motorcycle', 'delivery-multicab', 'delivery-truck', 'shipping'];
	return [
		'br_id' => 'factory:Branch',
		'classification' => Config::get('constants.CLASS_LOGISTICS'),
		'type' => $faker->randomElement($types),
		'rate' => $faker->randomFloat(2, 250, 1500),
		'remarks' => $faker->sentence()
	];
});
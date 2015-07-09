<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class HireEmployeeCest
{
    private $fields = ['user_id', 'br_id', 'dept_id',
        'firstname', 'middlename', 'lastname',
        'designation', 'address', 'contact_no',
        'recstat'];

    private $manager;

    private $employee;

    public function _before(FunctionalTester $I)
    {
        $this->employee = $I->buildDataFor('Employee');
    }

    public function try_to_add_new_employee_with_valid_credentials_with_manager_account(FunctionalTester $I)
    {
        $this->manager = $I->signInAsManager();

        $I->am('a manager');

        $I->wantTo('add new employee');

        $I->amOnPage(NewEmployeePage::$URL);

        $this->fillForm($I, $this->employee);

        $I->amOnRoute('employees_index_path');

        $I->see($this->getEmployeeFullname($this->employee));

        $I->seeRecord(EmployeesPage::$tableName, [
            'firstname' => strtolower($this->employee['firstname']),
            'middlename' => strtolower($this->employee['middlename']),
            'lastname' => strtolower($this->employee['lastname'])
        ]);
    }

    public function try_to_add_new_employee_with_existing_employee_with_manager_account(FunctionalTester $I)
    {
        $existingEmployee = $I->have('Employee');

        $this->manager = $I->signInAsManager();

        $I->am('a manager');

        $I->wantTo('add new employee with existing name');

        $I->expect('an error');

        $I->amOnPage(NewEmployeePage::$URL);

        $this->fillForm($I, $existingEmployee->toArray());

        $I->amOnRoute('employees_index_path');

        $I->dontSee($this->getEmployeeFullname($this->employee));

        $I->dontSeeRecord(EmployeesPage::$tableName, [
            'firstname' => strtolower($this->employee['firstname']),
            'middlename' => strtolower($this->employee['middlename']),
            'lastname' => strtolower($this->employee['lastname'])
        ]);
    }

    public function try_to_add_new_employee_with_valid_credentials_with_moderator_account(FunctionalTester $I)
    {
        $I->signInAsModerator();

        $I->am('a moderator');

        $I->wantTo('add new employee');

        $I->amOnPage(NewEmployeePage::$URL);

        $branches = Branch::lists('id');

        $I->selectOption( NewEmployeePage::$branchOptionField, $branches[array_rand($branches)]);

        $this->fillForm($I, $this->employee);

        $I->amOnRoute('employees_index_path');

        $I->see($this->getEmployeeFullname($this->employee));

        $I->seeRecord(EmployeesPage::$tableName, [
            'firstname' => strtolower($this->employee['firstname']),
            'middlename' => strtolower($this->employee['middlename']),
            'lastname' => strtolower($this->employee['lastname'])
        ]);
    }

    public function try_to_add_new_employee_and_create_account_with_moderator_account(FunctionalTester $I)
    {
        $I->signInAsModerator();

        $I->am('a moderator');

        $I->wantTo('add new employee with account');

        $I->amOnPage(NewEmployeePage::$URL);

        $branches = Branch::lists('id');

        $estimatorRoleId = 4;

        $I->checkOption('create_account');

        $I->selectOption( NewEmployeePage::$roleIdOptionField, $estimatorRoleId);

        $I->fillField( NewEmployeePage::$emailField, $this->createEmail($this->employee));

        $I->selectOption( NewEmployeePage::$branchOptionField, $branches[array_rand($branches)]);

        $this->fillForm($I, $this->employee);

        $I->amOnRoute('employees_index_path');

        $I->see($this->getEmployeeFullname($this->employee));

        $I->seeRecord(EmployeesPage::$tableName, [
            'firstname' => strtolower($this->employee['firstname']),
            'middlename' => strtolower($this->employee['middlename']),
            'lastname' => strtolower($this->employee['lastname'])
        ]);

        $employee = Employee::whereFirstname($this->employee['firstname'])
                ->whereMiddlename($this->employee['middlename'])
                ->whereLastname($this->employee['lastname'])
                ->first();

        $user = $employee->user()->first();

        $I->seeInLastEmail($user->activation_code);

        $I->assertEquals($user->id, $employee->user_id);
    }

    public function try_to_add_new_employee_and_create_account_with_manager_account(FunctionalTester $I)
    {
        $this->manager = $I->signInAsManager();

        $I->am('a manager');

        $I->wantTo('add new employee with account');

        $I->amOnPage(NewEmployeePage::$URL);

        $estimatorRoleId = 4;

        $I->checkOption( NewEmployeePage::$createAccountCheckbox);

        $I->selectOption( NewEmployeePage::$roleIdOptionField, $estimatorRoleId);

        $I->fillField( NewEmployeePage::$emailField, $this->createEmail($this->employee));

        $this->fillForm($I, $this->employee);

        $I->amOnRoute('employees_index_path');

        $I->see($this->getEmployeeFullname($this->employee));

        $I->seeRecord(EmployeesPage::$tableName, [
            'firstname' => strtolower($this->employee['firstname']),
            'middlename' => strtolower($this->employee['middlename']),
            'lastname' => strtolower($this->employee['lastname'])
        ]);

        $employee = Employee::whereFirstname($this->employee['firstname'])
            ->whereMiddlename($this->employee['middlename'])
            ->whereLastname($this->employee['lastname'])
            ->first();

        $user = $employee->user()->first();

        $I->seeInLastEmail($user->activation_code);

        $I->assertEquals($user->id, $employee->user_id);
    }

    public function try_to_add_new_employee_and_create_account_upload_picture_with_manager_account(FunctionalTester $I)
    {
        $this->manager = $I->signInAsManager();

        $I->am('a manager');

        $I->wantTo('add new employee and upload picture with account');

        $I->amOnPage(NewEmployeePage::$URL);

        $estimatorRoleId = 4;

        $I->checkOption('create_account');

        $I->selectOption( NewEmployeePage::$roleIdOptionField, $estimatorRoleId);

        $I->fillField( NewEmployeePage::$emailField, $this->createEmail($this->employee));

        $I->attachFile( NewEmployeePage::$photoFileUploadField, 'sexy.jpg');

        $this->fillForm($I, $this->employee);

        $I->amOnRoute('employees_index_path');

        $I->see($this->getEmployeeFullname($this->employee));

        $I->seeRecord(EmployeesPage::$tableName, [
            'firstname' => strtolower($this->employee['firstname']),
            'middlename' => strtolower($this->employee['middlename']),
            'lastname' => strtolower($this->employee['lastname'])
        ]);

        $employee = Employee::whereFirstname($this->employee['firstname'])
            ->whereMiddlename($this->employee['middlename'])
            ->whereLastname($this->employee['lastname'])
            ->first();

        $user = $employee->user()->first();

        $I->seeInLastEmail($user->activation_code);

        $I->assertEquals($user->id, $employee->user_id);

        $I->assertNotNull($employee->picture);
    }

    public function try_to_add_new_employee_and_create_account_upload_picture_with_non_image_file(FunctionalTester $I)
    {
        $this->manager = $I->signInAsManager();

        $I->am('a manager');

        $I->wantTo('add new employee and upload picture with non image file');

        $I->expect('an error');

        $I->amOnPage(NewEmployeePage::$URL);

        $estimatorRoleId = 4;

        $I->checkOption( NewEmployeePage::$createAccountCheckbox);

        $I->selectOption( NewEmployeePage::$roleIdOptionField, $estimatorRoleId);

        $I->fillField( NewEmployeePage::$emailField, $this->createEmail($this->employee));

        $I->attachFile( NewEmployeePage::$photoFileUploadField, 'smartcsv.csv');

        $this->fillForm($I, $this->employee);

        $I->amOnRoute('employees_index_path');

        $I->dontSee($this->getEmployeeFullname($this->employee));

        $I->dontSeeRecord(EmployeesPage::$tableName, [
            'firstname' => strtolower($this->employee['firstname']),
            'middlename' => strtolower($this->employee['middlename']),
            'lastname' => strtolower($this->employee['lastname'])
        ]);
    }


    private function getEmployeeFullname($employee)
    {
        return ucwords($employee['lastname'] . ', ' . $employee['firstname'] . ' ' . substr($employee['middlename'], 0, 1));
    }

    /**
     * @param FunctionalTester $I
     */
    protected function fillForm(FunctionalTester $I, $employee)
    {
        $I->fillField( NewEmployeePage::$firstnameField, $employee['firstname']);

        $I->fillField( NewEmployeePage::$middlenameField, $employee['middlename']);

        $I->fillField( NewEmployeePage::$lastnameField, $employee['lastname']);

        $I->selectOption( NewEmployeePage::$genderOptionField, $employee['gender']);

        $I->fillField( NewEmployeePage::$birthdateField, $employee['birthdate']);

        $I->fillField( NewEmployeePage::$addressField, $employee['address']);

        $I->fillField( NewEmployeePage::$contactNoField, $employee['contact_no']);

        $I->selectOption( NewEmployeePage::$deptIdField, $employee['dept_id']);

        $I->fillField( NewEmployeePage::$designationField, $employee['designation']);

        $I->click( NewEmployeePage::$formSubmitButton);
    }

    private function createEmail($employee)
    {
        return $employee['lastname'] . '.' . $employee['firstname'] . '@gmail.com';
    }


}
<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdateEmployeeCest
{
    private $manager;

    private $employee;

    private $newEmployeeData;

    private $fieldsToBeUpdated = ['firstname', 'middlename', 'lastname',
                                  'birthdate', 'gender', 'address',
                                  'contact_no', 'designation'];

    public function _before(FunctionalTester $I)
    {
        $this->manager = $I->signInAsManager();

        $this->employee = $I->have('Employee', [
            'br_id' => $this->manager->employee()->first()->br_id
        ]);

        $this->newEmployeeData = $I->buildDataFor('Employee');
    }

    // tests
    public function try_to_update_employee_with_valid_data(FunctionalTester $I)
    {
        $I->am('a manager');

        $I->wantTo('update employee with valid data');

        $I->amOnPage(EmployeesPage::$URL);

        $I->click('tr[data-employee-id='.$this->employee->id.']  a.update-employee-btn');

        $I->seeCurrentUrlEquals(UpdateEmployeePage::route($this->employee->id));

        foreach($this->fieldsToBeUpdated as $field)
        {
            if($field === 'gender') {
                $I->selectOption($field, $this->newEmployeeData[$field]);
                continue;
            }

            $I->fillField($field, $this->newEmployeeData[$field]);
        }

        $I->seeCurrentRouteIs('employees_index_path');

        $I->see('Employee successfully Udpdated.');

        $I->seeRecord(EmployeesPage::$tableName, [
           'id'  => $this->employee->id,
           'firstname' => $this->newEmployeeData['firstname'],
           'middlename' => $this->newEmployeeData['middlename'],
           'lastname' => $this->newEmployeeData['lastname'],
           'birthdate' => $this->newEmployeeData['birthdate'],
           'gender' => $this->newEmployeeData['gender'],
           'contact_no' => $this->newEmployeeData['contact_no'],
           'designation' => $this->newEmployeeData['designation']
        ]);
    }
}
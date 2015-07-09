<?php
use \FunctionalTester;
use Laracasts\TestDummy\Factory;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdateDepartmentCest
{

    private $department;

    private $otherDepartment;

    function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->department = Factory::create('Department');

        $this->otherDepartment = Factory::create('Department');
    }
    // tests
    public function try_to_update_department_name_with_valid_data(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('update ' . $this->department->name . ' department');

        $I->amOnPage(DepartmentsPage::$URL);

        $newDeptName = 'New Department Name';
        $I->sendAjaxRequest('PUT',
            URL::route('update_department_path'), [
                'id'   => $this->department->id,
                'name' => $newDeptName
            ]
        );

        $I->seeRecord(DepartmentsPage::$tableName, [
            'id' => $this->department->id,
            'name' => $newDeptName
        ]);
    }

    /*
     * @after try_to_update_department_name_with_valid_data
     *
     */
    public function try_to_update_department_name_with_existing_name(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('update department with existing name');

        $I->amOnPage(DepartmentsPage::$URL);

        $I->sendAjaxRequest('PUT',
            URL::route('update_department_path'), [
                'id' => $this->department->id,
                'name' => $this->otherDepartment->name
            ]
        );

        $I->seeResponseCodeIs(400);

        $I->seeRecord(DepartmentsPage::$tableName, [
            'id' => $this->department->id,
            'name' => $this->department->name]
        );
    }
}
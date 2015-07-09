<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class TerminateEmployeeCest
{
    private $employee;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsManager();

        $this->employee = $I->have('Employee');
    }

    // tests
    public function try_to_terminate_employee(FunctionalTester $I)
    {
        $I->am('a manager');

        $I->wantTo('terminate an employee');

        $I->amOnPage(EmployeesPage::$URL);

        $I->sendAjaxRequest('DELETE',
            URL::route('terminate_employee_path',$this->employee->id)
        );

        $I->seeResponseCodeIs(200);

        $employee = Employee::find($this->employee->id);

        $I->assertNotNull($employee->terminated_date);

        $I->assertEquals('I', $employee->recstat);
    }
}
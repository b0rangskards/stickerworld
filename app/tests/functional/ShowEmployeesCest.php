<?php
use \FunctionalTester;
use Laracasts\TestDummy\Factory;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ShowEmployeesCest
{
    private $employees;

    private $noOfEmployees = 10;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->employees = Factory::times($this->noOfEmployees)->create('Employee');
    }

    // tests
    public function try_to_show_all_employees(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('see all employees');

        $I->amOnPage(EmployeesPage::$URL);

        $I->seeNumberOfElements(EmployeesPage::$tableRow, $this->noOfEmployees);
    }
}
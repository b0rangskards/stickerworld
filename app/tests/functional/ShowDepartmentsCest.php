<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ShowDepartmentsCest
{

    private $noOfDepartments = 5;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();
    }

    // tests
    public function try_to_show_all_departments(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('see all departments');

        $I->amOnPage(DepartmentsPage::$URL);

//        $I->seeNumberOfElements(DepartmentsPage::$tableRow, $this->noOfDepartments);
    }
}
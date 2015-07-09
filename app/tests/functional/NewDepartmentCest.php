<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewDepartmentCest
{

    private $validBranchName = 'Marketing';

    private $fields = ['name'];

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();
    }

    public function try_to_add_new_department_with_valid_credentials(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('add new department');

        $I->amOnPage(DepartmentsPage::$URL);

        $response = $I->sendAjaxRequest('POST',
            URL::route('new_department_path'), ['name' => $this->validBranchName]
        );

        $I->seeRecord(DepartmentsPage::$tableName, ['name' => $this->validBranchName]);
    }

    /*
     * @after try_to_add_new_department_with_valid_credentials
     *
     */
    public function try_to_add_new_department_with_existing_department_name(FunctionalTester $I)
    {

        $I->am('an admin user');

        $I->wantTo('add new department with existing department name');

        $I->amOnPage(DepartmentsPage::$URL);

        $existingDepartmentName = 'Sales';

        $response = $I->sendAjaxRequest('POST',
            URL::route('new_department_path'), ['name' => $existingDepartmentName]
        );

        $I->seeResponseCodeIs(400);
    }
}
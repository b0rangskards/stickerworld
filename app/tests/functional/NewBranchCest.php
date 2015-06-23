<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewBranchCest
{
    private $fields = ['name', 'address', 'contact_no', 'lat', 'lng'];

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();
    }

    public function try_to_add_new_branch_with_valid_credentials(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('add new branch');

        $I->amOnPage(BranchesPage::$URL);

        $branch = $I->build('Branch');

        $params = [];
        foreach($this->fields as $field)
        {
            $params[$field] = $branch->$field;
        }

        $I->sendAjaxRequest('POST',
            URL::route('new_branch_path'), $params
        );

        $I->seeRecord(BranchesPage::$tableName, $params);
    }



}
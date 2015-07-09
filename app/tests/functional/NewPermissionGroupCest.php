<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewPermissionGroupCest
{
    private $permissionGroupData;

    private $permissionGroupInvalidData;
    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->permissionGroupData = $I->build('Permission', [
            'name'        => 'Items Management'
        ]);

        $this->permissionGroupInvalidData = $I->build('Permission', [
            'name' => ''
        ]);
    }

    // tests
    public function try_to_add_permission_group_with_valid_data(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('add new permission group with valid data');

        $I->amOnPage(AccessControlPage::$URL);

        $response = $I->sendAjaxRequest('POST',
            URL::route('new_permission_group_path'), [
                'name' => $this->permissionGroupData['name']
            ]
        );

        $I->seeResponseCodeIs(200);

        $I->seeRecord(AccessControlPage::$permissionGroupTableName, [
            'name' => $this->permissionGroupData['name'],
        ]);
    }

    /*
     * @after try_to_add_permission_group_with_valid_data
     *
     */
    public function try_to_add_permission_group_with_invalid_data(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('add new permission group with invalid data');

        $I->amOnPage(AccessControlPage::$URL);

        $response = $I->sendAjaxRequest('POST',
            URL::route('new_permission_group_path'), [
                'name' => $this->permissionGroupInvalidData['name']
            ]
        );

        $I->seeResponseCodeIs(400);

        $I->dontSeeRecord(AccessControlPage::$permissionGroupTableName, [
            'name' => $this->permissionGroupInvalidData['name'],
        ]);
    }
}
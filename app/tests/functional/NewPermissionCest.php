<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewPermissionCest
{
    private $permissionData;
    private $permissionInvalidData;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $permissionGroup = $I->have('PermissionGroup', ['name' => 'Manage Users']);

        $this->permissionData = $I->build('Permission', [
            'group_id'  =>  $permissionGroup->id,
            'name'      =>  'add user',
            'route'     =>  'add_user_path'
        ]);

        $this->permissionInvalidData = $I->build('Permission', [
            'group_id' => 0,
            'name' => 'add234',
            'route' => 'add_user_path'
        ]);
    }

    // tests
    public function try_to_add_permission_with_valid_data(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('add new permission with valid data');

        $I->amOnPage(AccessControlPage::$URL);

        $response = $I->sendAjaxRequest('POST',
            URL::route('new_permission_path'), [
                'group_id'    => $this->permissionData['group_id'],
                'name'        => $this->permissionData['name'],
                'route'       => $this->permissionData['route'],
                'description' => $this->permissionData['description']
            ]
        );

        $I->seeResponseCodeIs(200);

        $I->seeRecord(AccessControlPage::$permissionTableName, [
            'group_id'    => $this->permissionData['group_id'],
            'name'        => $this->permissionData['name'],
            'route'       => $this->permissionData['route'],
            'description' => $this->permissionData['description']
        ]);
    }

    /*
     * @after  try_to_add_permission_with_valid_data
     *
     */
    public function try_to_add_permission_with_invalid_data(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('add new permission with invalid data');

        $I->amOnPage(AccessControlPage::$URL);

        $response = $I->sendAjaxRequest('POST',
            URL::route('new_permission_path'), [
                'group_id' => $this->permissionInvalidData['group_id'],
                'name' => $this->permissionInvalidData['name'],
                'route' => $this->permissionInvalidData['route'],
                'description' => $this->permissionInvalidData['description']
            ]
        );

        $I->seeResponseCodeIs(400);

        $I->dontSeeRecord(AccessControlPage::$permissionTableName, [
            'group_id' => $this->permissionInvalidData['group_id'],
            'name' => $this->permissionInvalidData['name'],
            'route' => $this->permissionInvalidData['route'],
            'description' => $this->permissionInvalidData['description']
        ]);
    }
}
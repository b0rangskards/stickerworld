<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdatePermissionGroupCest
{
    private $permissionGroup;

    private $otherPermissionGroup;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->permissionGroup = $I->have('PermissionGroup');

        $this->otherPermissionGroup = $I->have('PermissionGroup');
    }

    // tests
    public function try_to_update_permission_group_name_with_valid_data(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('update group name with valid data');

        $I->amOnPage(AccessControlPage::$URL);

        $newGroupName = 'Payments';

        $I->sendAjaxRequest('PUT',
            URL::route('update_permission_group_path'),
            [
                'name' => 'name',
                'pk' => $this->permissionGroup->id,
                'value' => $newGroupName
            ]
        );

        $I->seeRecord(AccessControlPage::$permissionGroupTableName, [
            'id' => $this->permissionGroup->id,
            'name' => $newGroupName
        ]);
    }

    /*
     * try_to_update_permission_group_name_with_valid_data
     *
     */
    public function try_to_update_permission_group_name_with_existing_name(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('update group name with existing group name');

        $I->expect('an error');

        $I->amOnPage(AccessControlPage::$URL);

        $I->sendAjaxRequest('PUT',
            URL::route('update_permission_group_path'),
            [
                'name' => 'name',
                'pk' => $this->permissionGroup->id,
                'value' => $this->otherPermissionGroup->name
            ]
        );


        $I->seeResponseCodeIs(400);

        $I->dontSeeRecord(AccessControlPage::$permissionGroupTableName, [
            'id' => $this->permissionGroup->id,
            'name' => $this->otherPermissionGroup->name
        ]);
    }
}
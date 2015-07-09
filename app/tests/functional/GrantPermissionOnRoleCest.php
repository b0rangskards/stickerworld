<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class GrantPermissionOnRoleCest
{
    private $permission;

    private $role;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->permission = $I->have('Permission', ['name' => 'Manage Items']);

        $this->role = $I->have('Role', ['name' => 'Office Clerk']);
    }

    // tests
    public function try_to_grant_a_role_a_permission(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('grant a role a permission');

        $I->amOnPage(AccessControlPage::$URL);

        $response = $I->sendAjaxRequest('POST',
            URL::route('grant_role_permission_path'), [
                'role_id'       => $this->role->id,
                'permission_id' => $this->permission->id
            ]
        );

        $I->seeResponseCodeIs(200);

        $I->seeRecord(AccessControlPage::$permissionRoleTableName, [
            'role_id' => $this->role->id,
            'permission_id' => $this->permission->id
        ]);
    }

    /*
     * @after try_to_grant_a_role_a_permission
     *
     */
    public function try_to_grant_a_role_a_permission_with_existing_data(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('grant a role a permission with existing data');

        $I->expect('an error');

        $I->amOnPage(AccessControlPage::$URL);

        $this->grantPermission($I);

        $response = $I->sendAjaxRequest('POST',
            URL::route('grant_role_permission_path'), [
                'role_id' => $this->role->id,
                'permission_id' => $this->permission->id
            ]
        );

        $I->seeResponseCodeIs(400);
    }

    private function grantPermission($I)
    {
        $I->sendAjaxRequest('POST',
            URL::route('grant_role_permission_path'), [
                'role_id' => $this->role->id,
                'permission_id' => $this->permission->id
            ]
        );
    }
}
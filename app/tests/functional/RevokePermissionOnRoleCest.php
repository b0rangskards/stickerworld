<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class RevokePermissionOnRoleCest
{
    private $permissionRole;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->permissionRole = $I->have('PermissionRole');
    }

    // tests
    public function try_to_revoke_a_permission_from_a_role(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('revoke a permission from a role');

        $I->amOnPage(AccessControlPage::$URL);

        $response = $I->sendAjaxRequest('DELETE',
            URL::route('revoke_role_permission_path'), [
                'id' => $this->permissionRole->id
            ]
        );

        $I->seeResponseCodeIs(200);

        $I->dontSeeRecord(AccessControlPage::$permissionRoleTableName, [
            'role_id' => $this->permissionRole->role_id,
            'permission_id' => $this->permissionRole->permission_id
        ]);
    }

    public function try_to_revoke_a_permission_from_a_role_with_invalid_id(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('revoke a permission from a role with invalid id');

        $I->amOnPage(AccessControlPage::$URL);

        $response = $I->sendAjaxRequest('DELETE',
            URL::route('revoke_role_permission_path'), [
                'id' => 99999
            ]
        );

        $I->seeResponseCodeIs(400);
    }
}
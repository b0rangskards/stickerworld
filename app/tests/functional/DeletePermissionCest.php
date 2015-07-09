<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class DeletePermissionCest
{
    private $permission;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->permission = $I->have('Permission');
    }

    // tests
    public function try_to_delete_permission(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('delete a permission group');

        $I->amOnPage(AccessControlPage::$URL);

        $I->sendAjaxRequest('DELETE',
            URL::route('delete_permission_path', $this->permission->id)
        );

        $I->seeResponseCodeIs(200);

        $I->dontSeeRecord(AccessControlPage::$permissionTableName, [
            'id' => $this->permission->id
        ]);

        $I->dontSeeRecord(AccessControlPage::$permissionRoleTableName, [
           'permission_id' => $this->permission->id
        ]);
    }
}
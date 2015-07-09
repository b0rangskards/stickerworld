<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class DeletePermissionGroupCest
{
    private $permissionGroup;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->permissionGroup = $I->have('PermissionGroup');
    }

    // tests
    public function try_to_delete_permission_group(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('delete a permission group');

        $I->amOnPage(AccessControlPage::$URL);

        $I->sendAjaxRequest('DELETE',
            URL::route('delete_permission_group_path', $this->permissionGroup->id)
        );

        $I->seeResponseCodeIs(200);

        $I->dontSeeRecord(AccessControlPage::$permissionGroupTableName, [
            'id' => $this->permissionGroup->id,
            'name' => $this->permissionGroup->name
        ]);

        $I->dontSeeRecord(AccessControlPage::$permissionTableName, [
            'group_id' => $this->permissionGroup->id
        ]);
    }
}
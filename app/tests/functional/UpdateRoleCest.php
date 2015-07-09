<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdateRoleCest
{
    private $role;

    private $otherRole;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->role = $I->have('Role', ['name' => 'Super Admin']);

        $this->otherRole = $I->have('Role', ['name' => 'Super Manager']);
    }

    // tests
    public function try_to_update_role_name_with_valid_data(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('update role name with valid data');

        $I->amOnPage(AccessControlPage::$URL);

        $newRoleName = 'Master Admin';

        $I->sendAjaxRequest('PUT',
            URL::route('update_role_path'),
            [
                'name'  => 'name',
                'pk'    => $this->role->id,
                'value' => $newRoleName
            ]
        );

        $I->seeRecord(AccessControlPage::$roleTableName, [
            'id' => $this->role->id,
            'name' => $newRoleName
        ]);
    }


   /*
   * @after try_to_update_role_name_with_valid_data
   *
   */
    public function try_to_update_role_with_existing_name(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('update role name with valid data');

        $I->amOnPage(AccessControlPage::$URL);

        $I->sendAjaxRequest('PUT',
            URL::route('update_role_path'),
            [
                'name' => 'name',
                'pk' => $this->role->id,
                'value' => $this->otherRole->name
            ]
        );


        $I->seeResponseCodeIs(400);

        $I->dontSeeRecord(AccessControlPage::$roleTableName, [
                'id' => $this->role->id,
                'name' => $this->otherRole->name
        ]);
    }
}
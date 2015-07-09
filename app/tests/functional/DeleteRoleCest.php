<?php
use \FunctionalTester;
use Laracasts\TestDummy\Factory;

/**
 * @guy FunctionalTester\MemberSteps
 */
class DeleteRoleCest
{
    private $role;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->role = Factory::create('Role', ['name' => 'Super User']);
    }

    // tests
    public function try_to_delete_role(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('delete a role');

        $I->amOnPage(AccessControlPage::$URL);

        $I->sendAjaxRequest('DELETE',
            URL::route('delete_role_path', $this->role->id)
        );

        $I->seeResponseCodeIs(200);

        $I->dontSeeRecord(AccessControlPage::$roleTableName, [
            'id' => $this->role->id,
            'name' => $this->role->name
        ]);
    }
}
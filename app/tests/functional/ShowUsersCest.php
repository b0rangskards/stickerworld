<?php
use \FunctionalTester;
use Laracasts\TestDummy\Factory;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ShowUsersCest
{

    private $users;

    private $noOfUsers = 10;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->users = Factory::times($this->noOfUsers)->create('User');
    }

    // tests
    public function try_to_show_all_users(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('see all users');

        $I->amOnPage(UsersPage::$URL);

       foreach($this->users as $user) {
           $I->seeRecord('users',
               [
                   'username' => $user->username
               ]
            );
       }
    }
}
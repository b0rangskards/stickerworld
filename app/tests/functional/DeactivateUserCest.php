<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class DeactivateUserCest
{

    private $role_id = 2;

    private $username = 'sample';

    private $password = 'samplepassword123';

    private $email = 'sampleuser123@yahoo.com';


    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $I->createUser($this->role_id, $this->username, $this->password, $this->email, 'A');
    }

    public function try_to_deactivate_user(FunctionalTester $I)
    {
        $I->amOnPage(UsersPage::$URL);

        $I->see('Management', 'span');

        $I->canSeeNumberOfElements('tr', 2);

        $I->canSee($this->username, 'tr:nth-child(1) td');

        $I->click(UsersPage::$deactivateButton);

        $user = User::whereEmail($this->email)->first();

        $I->assertEquals('I', $user->recstat);
    }

}
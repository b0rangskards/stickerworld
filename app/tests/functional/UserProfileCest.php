<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UserProfileCest
{
    private $roleId = 3;

    private $username = 'sample';

    private $password = 'samplepassword123';

    private $email = 'sampleuser123@yahoo.com';



    public function _before(FunctionalTester $I)
    {
        $I->createUser($this->roleId, $this->username, $this->password, $this->email);

        $I->login($this->username, $this->password);
    }


    // tests
    public function try_to_access_users_profile(FunctionalTester $I)
    {
        $I->am('an employee and i have an active account');

        $I->wantTo('see my profile');

        $I->amOnPage(UserProfilePage::$URL . '/' . $this->username);

        $I->see('Basic Details', 'li > a');
    }
}
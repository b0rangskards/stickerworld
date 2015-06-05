<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ActivateAccountWithEmailCest
{

    private $role_id;
    private $email;

    public function _before(FunctionalTester $I)
    {
        $I->resetEmails();

        $I->signInAsAdmin();

        $this->role_id = 3;
        $this->email = 'testemail@yahoo.com';

        $I->registerAUser($this->role_id, $this->email);

        Auth::logout();
    }

    public function activateAccount(FunctionalTester $I)
    {
        $username = 'testusername';
        $password = 'testpassword';

        $activation_code = User::whereEmail($this->email)->first()->activation_code;

        $I->am('an employee and i have unactivated account');

        $I->wantTo('activate my account');

        $I->amOnPage( ActivateUserPage::$URL.$activation_code);

        $I->see( ActivateUserPage::$header);

        $I->fillField( ActivateUserPage::$usernameField, $username);

        $I->fillField( ActivateUserPage::$passwordField, $password);

        $I->fillField( ActivateUserPage::$confirmPasswordField, $password);

        $I->click( ActivateUserPage::$activateButton);

        $I->assertTrue(Auth::check());

        $I->assertEquals( $username, Auth::user()->username);

        $I->assertTrue( Hash::check($password, Auth::user()->password ));

        $I->seeInCurrentUrl('dashboard');

        $I->see('You have successfully activated your account.');
    }

}
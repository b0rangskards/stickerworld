<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ChangePasswordCest
{
    private $id;

    private $roleId = 3;

    private $username = 'sample';

    private $password = 'samplepassword123';

    private $email = 'sampleuser123@yahoo.com';

    private $newPassword = 'mynewpassword123';

    private $invalidPassword = '32';


    public function _before(FunctionalTester $I)
    {
        $I->createUser($this->roleId, $this->username, $this->password, $this->email);

        $I->login($this->username, $this->password);
    }

    public function _after(FunctionalTester $I)
    {
        $I->deleteUserById($this->id);
    }


    public function try_to_change_password_with_valid_inputs(FunctionalTester $I)
    {
        $this->changePassword($I, $this->newPassword);
    }

    public function try_to_change_password_with_invalid_inputs(FunctionalTester $I)
    {
        $this->changePassword($I, $this->invalidPassword, false);
    }

    /**
     * @param FunctionalTester $I
     */
    private function changePassword(FunctionalTester $I, $newPassword, $isValidInput = true)
    {
        $I->am('an employee and i have an active account');

        $I->wantTo('change my password');

        $I->amOnPage(UserProfilePage::url($this->username));

        $I->click(UserProfilePage::$basicDetailsTab);

        $I->see(UserProfilePage::$changePasswordLink, 'a');

        $I->click(UserProfilePage::$changePasswordLink);

        $I->see('Current', 'label');

        $I->fillField('Current', $this->password);

        $I->fillField('New Password', $newPassword);

        $I->fillField('Confirm New', $newPassword);


        $I->canSeeExceptionThrown('Exception', function () use ($I) {
            $I->click('Save Changes');
        });

        $user = User::whereUsername($this->username)->first();

        $this->id = $user->id;

        if( $isValidInput )
        {
            $I->assertTrue(Hash::check($newPassword, $user->password));
        }
        else {
            $I->assertTrue(Hash::check($this->password, $user->password));
        }
    }

}
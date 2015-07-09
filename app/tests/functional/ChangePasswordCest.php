<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ChangePasswordCest
{
    private $user;

    private $currentPassword = 'mypassword1234';

    private $validPassword = 'mynewpassword123';

    private $invalidPassword = '32';

    public function _before(FunctionalTester $I)
    {
        $this->user = $I->have('User', ['role_id' => 1, 'password' => $this->currentPassword, 'recstat' => 'A']);

        $I->login($this->user->username, $this->currentPassword);
    }

    public function try_to_change_password_with_valid_inputs(FunctionalTester $I)
    {
        $I->am('an employee and i have an active account');

        $I->wantTo('change my password');

        $I->amOnPage(UserProfilePage::url($this->user->username));

        $I->click(UserProfilePage::$basicDetailsTab);

        $I->see(UserProfilePage::$changePasswordLink, 'a');

        $I->click(UserProfilePage::$changePasswordLink);

        $I->see('Current', 'label');

        $I->fillField('Current', $this->currentPassword);

        $I->fillField('New Password', $this->validPassword);

        $I->fillField('Confirm New', $this->validPassword);

        $I->canSeeExceptionThrown('Exception', function () use ($I) {

            $I->click('Save Changes');

            $I->assertTrue(Hash::check($this->validPassword, $this->user->password));
        });
    }

    /*
     * @after try_to_change_password_with_valid_inputs
     *
     */
    public function try_to_change_password_with_invalid_inputs(FunctionalTester $I)
    {
        $I->am('an employee and i have an active account');

        $I->wantTo('change my password');

        $I->amOnPage(UserProfilePage::url($this->user->username));

        $I->click(UserProfilePage::$basicDetailsTab);

        $I->see(UserProfilePage::$changePasswordLink, 'a');

        $I->click(UserProfilePage::$changePasswordLink);

        $I->see('Current', 'label');

        $I->fillField('Current', $this->currentPassword);

        $I->fillField('New Password', $this->validPassword);

        $I->fillField('Confirm New', $this->validPassword);

        $I->canSeeExceptionThrown('Exception', function () use ($I) {

            $I->click('Save Changes');

            $I->assertFalse(Hash::check($this->invalidPassword, $this->user->password));
        });
    }


}
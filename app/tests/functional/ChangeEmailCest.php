<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ChangeEmailCest
{

    private $id;

    private $roleId = 3;

    private $username = 'sample';

    private $password = 'samplepassword123';

    private $email = 'sampleuser123@yahoo.com';

    private $validEmail = 'avalidemail@yahoo.com';

    private $invalidEmail = 'sampleyahoo.com';

    /* TODO: need to create acceptance test for ajax xeditable */
    public function _before(FunctionalTester $I)
    {
        $I->createUser($this->roleId, $this->username, $this->password, $this->email);

        $I->login($this->username, $this->password);
    }

    public function _after(FunctionalTester $I)
    {
        $I->deleteUserById($this->id);
    }

    // tests
    public function try_to_change_email_with_valid_inputs(FunctionalTester $I)
    {
        $this->testEmail($I, $this->validEmail);
    }

    public function try_to_change_email_with_invalid_inputs(FunctionalTester $I)
    {
        $this->testEmail($I, $this->invalidEmail, false);
    }

    /**
     * @param FunctionalTester $I
     */
    private function testEmail(FunctionalTester $I, $email, $isEmailValid = true)
    {
        $user = $I->getUserByUsername($this->username);

        $this->id = $user->id;

        $I->am('an employee and i have an active account');

        $I->wantTo('change my email');

        $I->amOnPage(UserProfilePage::url($this->username));

        $I->click(UserProfilePage::$basicDetailsTab);

        $I->click(UserProfilePage::$changeEmailLink);

        $I->sendAjaxRequest('PUT',
            URL::route('update_user_email_path'),
            [
                'name' => 'email',
                'pk' => $user->id,
                'value' => $email
            ]);

        if( $isEmailValid )
        {
            $I->assertEquals(
                $email,
                User::find($user->id)->first()->email
            );
        }
        else
        {
            $I->assertEquals(
                $this->email,
                User::find($user->id)->first()->email
            );
        }

    }
}
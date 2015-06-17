<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ChangeUsernameCest
{
    private $id;

    private $roleId = 3;

    private $username = 'sample';

    private $password = 'samplepassword123';

    private $email = 'sampleuser123@yahoo.com';

    private $validNewUsername = 'myusername';

    private $invalidNewUsername = 'd#';

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
    public function try_to_change_username_with_valid_inputs(FunctionalTester $I)
    {
        $this->testUsername($I, $this->validNewUsername);
    }

    public function try_to_change_username_with_invalid_inputs(FunctionalTester $I)
    {
        $this->testUsername($I, $this->invalidNewUsername, false);
    }

    /**
     * @param FunctionalTester $I
     */
    private function testUsername(FunctionalTester $I, $newUsername, $isUsernameValid = true)
    {
        $user = $I->getUserByUsername($this->username);

        $this->id = $user->id;

        $I->am('an employee and i have an active account');

        $I->wantTo('change my username');

        $I->amOnPage(UserProfilePage::url($this->username));

        $I->click(UserProfilePage::$basicDetailsTab);

        $I->click(UserProfilePage::$changeUsernameLink);

        $I->sendAjaxRequest('PUT',
            URL::route('update_username_path'),
            [
                'name' => 'email',
                'pk' => $user->id,
                'value' => $newUsername
            ]
        );

        if( $isUsernameValid )
        {
            $I->assertEquals(
                $newUsername,
                User::find($user->id)->first()->username
            );
        }
        else
        {
            $I->assertEquals(
                $this->username,
                User::find($user->id)->first()->username
            );
        }

    }

}
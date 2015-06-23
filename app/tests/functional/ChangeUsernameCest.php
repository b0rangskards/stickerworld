<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ChangeUsernameCest
{
    private $user;

    private $validNewUsername = 'myusername';

    private $invalidNewUsername = 'd#';

/* TODO: need to create acceptance test for ajax xeditable */
    public function _before(FunctionalTester $I)
    {
        $myPassword = 'mypassword1234';

        $this->user = $I->have('User', ['password' => $myPassword, 'recstat' => 'A']);

        $I->login($this->user->username, $myPassword);
    }

    // tests
    public function try_to_change_username_with_valid_inputs(FunctionalTester $I)
    {
        $I->am('an employee and i have an active account');

        $I->wantTo('change my username with valid data');

        $I->amOnPage(UserProfilePage::url($this->user->username));

        $I->click(UserProfilePage::$basicDetailsTab);

        $I->click(UserProfilePage::$changeUsernameLink);

        $I->sendAjaxRequest('PUT',
            URL::route('update_username_path'),
            [
                'name' => 'email',
                'pk' => $this->user->id,
                'value' => $this->validNewUsername
            ]
        );

        $I->seeResponseCodeIs(200);

        $user = User::where('id', $this->user->id)->first();

        $I->assertEquals(
            $this->validNewUsername,
            $user->username
        );
    }

    /*
     * @after try_to_change_username_with_valid_inputs
     *
     */
    public function try_to_change_username_with_invalid_inputs(FunctionalTester $I)
    {
        $I->am('an employee and i have an active account');

        $I->wantTo('change my username with invalid data');

        $I->amOnPage(UserProfilePage::url($this->user->username));

        $I->click(UserProfilePage::$basicDetailsTab);

        $I->click(UserProfilePage::$changeUsernameLink);

        $I->sendAjaxRequest('PUT',
            URL::route('update_username_path'),
            [
                'name' => 'email',
                'pk' => $this->user->id,
                'value' => $this->invalidNewUsername
            ]
        );

        $I->seeResponseCodeIs(400);

        $user = User::where('id', $this->user->id)->first();

        $I->assertNotEquals(
            $this->invalidNewUsername,
            $this->user->username
        );
    }


}
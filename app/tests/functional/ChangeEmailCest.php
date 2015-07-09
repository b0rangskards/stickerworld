<?php
use \FunctionalTester;
use Laracasts\TestDummy\Factory;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ChangeEmailCest
{

    protected $user;

    private $validEmail = 'myvalidemail@yahoo.com';

    private $invalidEmail = 'invalidemailyahoo.com';

    /* TODO: need to create acceptance test for ajax xeditable */
    public function _before(FunctionalTester $I)
    {
        $myPassword = 'mypassword1234';

        $this->user = $I->have('User', ['role_id' => 1, 'password' => $myPassword, 'recstat' => 'A']);

        $I->login($this->user->username, $myPassword);
    }

    public function try_to_change_email_with_valid_inputs(FunctionalTester $I)
    {
        $I->am('an employee and i have an active account');

        $I->wantTo('change my email');

        $I->amOnPage(UserProfilePage::url($this->user->username));

        $I->click(UserProfilePage::$basicDetailsTab);

        $I->click(UserProfilePage::$changeEmailLink);

        $I->sendAjaxRequest('PUT',
            URL::route('update_user_email_path'),
            [
                'name' => 'email',
                'pk' => $this->user->id,
                'value' => $this->validEmail
            ]);

        $I->seeResponseCodeIs(200);

        $user = User::where('id', $this->user->id)->first();

        $I->assertEquals(
            $this->validEmail, $user->email
        );
    }

    /*
     * @after try_to_change_email_with_valid_inputs
     *
     */
    public function try_to_change_email_with_invalid_inputs(FunctionalTester $I)
    {
        $I->am('an employee and i have an active account');

        $I->wantTo('change my email');

        $I->amOnPage(UserProfilePage::url($this->user->username));

        $I->click(UserProfilePage::$basicDetailsTab);

        $I->click(UserProfilePage::$changeEmailLink);

        $I->sendAjaxRequest('PUT',
            URL::route('update_user_email_path'),
            [
                'name' => 'email',
                'pk' => $this->user->id,
                'value' => $this->invalidEmail
            ]);

        $I->seeResponseCodeIs(400);

        $user = User::where('id', $this->user->id)->first();

        $I->assertNotEquals(
            $this->invalidEmail,
            $user->email
        );
    }

}
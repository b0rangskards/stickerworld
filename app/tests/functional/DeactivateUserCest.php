<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class DeactivateUserCest
{
    private $user;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->user = $I->have('User', ['recstat' => 'A']);
    }

    public function try_to_deactivate_user(FunctionalTester $I)
    {
        $I->amOnPage(UsersPage::$URL);

        $I->see('Management', 'span');

//        $I->canSeeNumberOfElements('tr', 2);

//        $I->canSee($this->user->username, 'tr:nth-child(1) td');

//        $I->click(UsersPage::$deactivateButton);
        $I->sendAjaxRequest('PUT',
            URL::route('deactivate_user_path'),
            [
                'userId' => $this->user->id
            ]);


        $user = User::where('id', $this->user->id)->first();

        $I->assertEquals('I', $user->recstat);
    }

}
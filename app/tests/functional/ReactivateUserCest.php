<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ReactivateUserCest
{

    private $user;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->user = $I->have('User', ['recstat' => 'A']);
    }

    public function try_to_reactivate_user(FunctionalTester $I)
    {
        $I->amOnPage(UsersPage::$URL);

        $I->see('Management', 'span');

//        $I->canSeeNumberOfElements('tr', 2);

//        $I->canSee($this->user->username, 'tr:nth-child(1) td');

//        $I->click(UsersPage::$reactivateButton);
        $I->sendAjaxRequest('PUT',
            URL::route('reactivate_user_path'),
            [
                'userId' => $this->user->id
            ]);


        $user = User::find($this->user->id);

        $I->assertEquals('A', $user->recstat);
    }

}
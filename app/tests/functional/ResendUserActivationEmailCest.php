<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ResendUserActivationEmailCest
{

    private $estimator_id = 3;

    private $email = 'estimatorsample@yahoo.com';

    private $user;

    public function _before(FunctionalTester $I)
    {
        $I->resetEmails();

        $I->signInAsAdmin();

        $I->registerAUser($this->estimator_id, $this->email);

        $I->seeEmailCount(1);

        $this->user = User::whereEmail($this->email)->first();
    }

    public function try_to_resend_user_activation_email(FunctionalTester $I)
    {
        $I->amOnPage(UsersPage::$URL);

        $I->see('Management', 'span');

        $I->canSeeNumberOfElements('tr', 2);

        $I->canSee($this->user->username, 'tr:nth-child(1) td');

        $I->click( UsersPage::$resendButton);

        $I->seeEmailCount(2);
    }

    private function getRegisteredUser()
    {
        return User::whereEmail($this->email)->first();
    }
}
<?php
use \FunctionalTester;

class RegisterUserWithGuestAccountCest
{
    /**
     * @test
     */
    public function try_to_register_user_with_guest_account(FunctionalTester $I)
    {
        $I->am('a guest user');
        $I->wantTo('create an account for new user');
        $I->expect('being redirected to login page');

        $I->amOnPage( RegistrationPage::$URL);

        $I->seeInCurrentUrl( SignInPage::$URL);
        $I->see( 'Please Log in to Continue');
    }
}
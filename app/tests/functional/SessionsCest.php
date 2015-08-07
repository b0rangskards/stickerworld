<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class SessionsCest
{
    public function try_to_access_home_with_valid_account(FunctionalTester $I)
    {
        $I->am('a registered user');
        $I->wantTo('login to my account');

        $I->signInAsAdmin();

        $I->seeCurrentRouteIs(HomePage::$ROUTE);
        $I->see(HomePage::$welcomeMessage, 'h2');

        $I->assertTrue(Auth::check());
    }

    public function try_to_access_home_with_invalid_account(FunctionalTester $I)
    {
        $invalidUsername = 'invalidUsername';
        $invalidPassword = 'invalidPassword';

        $I->am('am a guest user');
        $I->wantTo('try to login with unregistered credentials');

        $I->login($invalidUsername, $invalidPassword);

        $I->seeInCurrentUrl(SignInPage::$URL);
        $I->see( SignInPage::$invalidCredentialsMessage);

        $I->assertTrue(Auth::guest());
    }

    public function try_to_log_out_authenticated_user(FunctionalTester $I)
    {
        $I->am('a authenticated user');
        $I->wantTo('logout to my account');

        $I->signInAsAdmin();

        $I->seeCurrentRouteIs(HomePage::$ROUTE);
        $I->see( HomePage::$welcomeMessage, 'h2');

        $I->assertTrue(Auth::check());

        $I->logout();

        $I->assertTrue(Auth::guest());
        $I->see( SignOutPage::$loggedOutMessage);
    }


}
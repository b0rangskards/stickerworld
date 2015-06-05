<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class PagesCest
{
    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();
    }

    // tests
    public function try_to_access_a_page_that_does_not_exist(FunctionalTester $I)
    {
        $I->am('a registered user');
        $I->wantTo('access a page that does not exist');
        $I->expect('being redirected to page not found');

        $I->assertTrue(
            $I->seeExceptionThrown('Symfony\Component\HttpKernel\Exception\NotFoundHttpException', function () use ($I) {
                $I->amOnPage('dasjdasdals');
            })
          );

        $I->amOnPage( NotFoundPage::$URL);
        $I->seeLink( NotFoundPage::$backToHomeButton);
    }


}
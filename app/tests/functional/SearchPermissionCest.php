<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class SearchPermissionCest
{
    private $searchPermission;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->searchPermission = $I->have('Permission');

        $I->haveTimes('Permission', 10);
    }

    // tests
    public function try_to_search_an_existing_permission(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('search an existing permission');

        $I->amOnPage(AccessControlPage::$URL);

        $I->fillField('q', $this->searchPermission->name);

        $I->click('#search-permission-btn');

        $I->see($this->searchPermission->name, 'table tbody');
    }

    /*
     * @after try_to_search_an_existing_permission
     *
     */
    public function try_to_search_a_permission_that_doesnt_exist(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('search a permission that doesnt exist');

        $I->amOnPage(AccessControlPage::$URL);

        $unidentified = 'hweruiu';

        $I->fillField('q', $unidentified);

        $I->click('#search-permission-btn');

        $I->dontSee($unidentified, 'table tbody');
    }
}
<?php
use \FunctionalTester;
use Laracasts\TestDummy\Factory;

/**
 * @guy FunctionalTester\MemberSteps
 */
class SearchBranchCest
{
    private $searchBranch;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->searchBranch = Factory::create('Branch', ['name' => 'Pasig']);

        Factory::times(10)->create('Branch');
    }
    // tests
    public function try_to_search_an_existing_branch(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('search an existing branch with its name');

        $I->amOnPage(BranchesPage::$URL);

        $I->fillField('qbranch', $this->searchBranch->name);

        $I->click('#search-branch-submit-btn');

        $I->see($this->searchBranch->name, '.panel-heading');
    }

    /*
     * @after try_to_search_an_existing_branch
     *
     */
    public function try_to_search_a_branch_that_doesnt_exist(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('search a branch that doesnt exist with its name');

        $I->amOnPage(BranchesPage::$URL);

        $unidentifiedBranch = 'hweruiu';

        $I->fillField('qbranch', $unidentifiedBranch);

        $I->click('#search-branch-submit-btn');

        $I->see('No matching records found', '.gen-case');

    }
}
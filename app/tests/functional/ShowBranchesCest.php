<?php
use \FunctionalTester;
use Laracasts\TestDummy\Factory;

/**
 * @guy FunctionalTester\MemberSteps
 */
class ShowBranchesCest
{
    private $branches;

    private $noOfBranches = 3;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->branches = Factory::times($this->noOfBranches)->create('Branch');
    }

    // tests
    public function try_to_show_all_branches(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('see all branches');

        $I->amOnPage(BranchesPage::$URL);

        $I->seeNumberOfElements(BranchesPage::$branchThumbnail, $this->noOfBranches);
    }
}
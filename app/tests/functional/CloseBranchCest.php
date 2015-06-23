<?php
use \FunctionalTester;
use Laracasts\TestDummy\Factory;

/**
 * @guy FunctionalTester\MemberSteps
 */
class CloseBranchCest
{
    private $branch;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->branch = Factory::create('Branch');
    }

    // tests
    public function try_to_close_branch(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('close a branch');

        $I->amOnPage(BranchesPage::$URL);

        $I->sendAjaxRequest('DELETE',
            URL::route('close_branch_path', $this->branch->id)
        );

        $myBranch = Branch::find($this->branch->id);

        $I->assertNull($myBranch);
    }
}
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

        $this->branch = $I->have('Branch');
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

        $I->seeResponseCodeIs(200);

        $I->dontSeeRecord(BranchesPage::$tableName, [
           'id'   => $this->branch->id,
           'name' => $this->branch->name
        ]);
    }
}
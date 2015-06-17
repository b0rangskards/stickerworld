<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class AddNewBranchCest
{
    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function try_to_add_new_branch_with_valid_credentials(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('add new branch');

        $I->amOnPage('/');

        $I->click(SideMenuPage::$branchesButton);

        $I->seeCurrentUrlEquals(BranchesPage::$URL);

        $I->click(BranchesPage::$newBranchButton);

        $I->sendAjaxRequest('POST',
            URL::route('new_branch_path'),
            [
                'name' => 'email',
                'pk' => $user->id,
                'value' => $newUsername
            ]
        );

    }
}
<?php
use \FunctionalTester;
use Laracasts\TestDummy\Factory;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdateBranchInformationCest
{

    private $branch;

    private $newBranchInfo;

    private $otherBranch;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->branch = Factory::create('Branch');

        $this->otherBranch = Factory::create('Branch');

        $this->newBranchInfo = Factory::attributesFor('Branch');
    }

    // tests
    public function try_to_update_branch_with_valid_information(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('update '. $this->branch->name .' branch information');

        $I->amOnPage(BranchesPage::$URL);

        $this->newBranchInfo['id'] = $this->branch->id;

        $I->sendAjaxRequest('PUT',
            URL::route('update_branch_path'), $this->newBranchInfo
        );

        $I->seeRecord(BranchesPage::$tableName, [
            'id'            => $this->branch->id,
            'name'          => $this->newBranchInfo['name'],
            'address'       => $this->newBranchInfo['address'],
            'contact_no'    => $this->newBranchInfo['contact_no'],
            'lat'           => $this->newBranchInfo['lat'],
            'lng'           => $this->newBranchInfo['lng']
        ]);
    }

    /*
     * @after try_to_update_branch_with_valid_information
     *
     */
    public function try_to_update_branch_with_existing_branch_name(FunctionalTester $I)
    {
        $oldBranchName = $this->branch->name;
        $existingBranchName = $this->otherBranch->name;

        $I->am('an admin');

        $I->wantTo('update branch name with existing branch name');

        $I->expect('getting error');

        $I->amOnPage(BranchesPage::$URL);

        $this->newBranchInfo['id'] = $this->branch->id;

        $this->newBranchInfo['name'] = $existingBranchName;

        $I->sendAjaxRequest('PUT',
            URL::route('update_branch_path'), $this->newBranchInfo
        );

        $I->seeRecord(BranchesPage::$tableName, [
            'id'    => $this->branch->id,
            'name'  => $oldBranchName
        ]);
    }

}
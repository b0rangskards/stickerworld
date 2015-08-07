<?php
use Acme\Helpers\StrHelper;
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

        $this->branch = $I->have('Branch');

        $this->otherBranch = $I->have('Branch');

        $this->newBranchInfo = $I->buildDataFor('Branch', [
            'name' => 'Mambaling',
            'contact_no'    =>  '268-9279',
            'address'   => '#220 N. Bacalso Avenue
                            National Highway, Mambaling
                            Cebu City, Cebu 6000
                            Philippines'
        ]);
    }

    // tests
    public function try_to_update_branch_with_valid_information(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('update branch information with valid data');

        $I->amOnPage(BranchesPage::$URL);

        $this->newBranchInfo['id'] = $this->branch->id;

        $I->sendAjaxRequest('PUT',
            URL::route('update_branch_path'), $this->newBranchInfo
        );

        $I->seeRecord(BranchesPage::$tableName, [
            'id'            => $this->branch->id,
            'name'          => strtolower(StrHelper::cleanSpacing($this->newBranchInfo['name'])),
            'address'       => strtolower(StrHelper::cleanSpacing($this->newBranchInfo['address'])),
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
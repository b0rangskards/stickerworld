<?php
use Acme\Helpers\StrHelper;
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewBranchCest
{
    private $fields = ['name', 'address', 'contact_no', 'lat', 'lng'];

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();
    }

    public function try_to_add_new_branch_with_valid_credentials(FunctionalTester $I)
    {
        $I->am('an admin user');

        $I->wantTo('add new branch');

        $I->amOnPage(BranchesPage::$URL);

        $branch = $I->buildDataFor('Branch', [
            'name' => 'Mambaling',
            'contact_no' => '268-9279',
            'address' => '#220 N. Bacalso Avenue
                            National Highway, Mambaling
                            Cebu City, Cebu 6000
                            Philippines'
        ]);

        $I->sendAjaxRequest('POST',
            URL::route('new_branch_path'), $branch
        );

        $I->seeRecord(BranchesPage::$tableName, [
            'name' => strtolower(StrHelper::cleanSpacing($branch['name'])),
            'address' => strtolower(StrHelper::cleanSpacing($branch['address'])),
            'contact_no' => $branch['contact_no'],
            'lat' => $branch['lat'],
            'lng' => $branch['lng']
        ]);
    }



}
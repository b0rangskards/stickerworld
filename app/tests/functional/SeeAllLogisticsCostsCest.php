<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class SeeAllLogisticsCostsCest
{
	private $manager;

	public function _before(FunctionalTester $I)
	{
		$this->manager = $I->signInAsManager();
	}

    // tests
    public function try_to_see_all_logistics(FunctionalTester $I)
    {
	    $logistics = $I->haveTimes('logistics_cost', 5, [
		    'br_id' => $this->manager->employee->br_id
	    ]);

	    $I->am('a manager');

	    $I->wantTo('see all logistics cost');

	    $I->amOnPage(LogisticsCostsPage::$URL);

	    foreach ( $logistics as $logistic ) {
		    $I->see($logistic->type);
	    }
    }
}
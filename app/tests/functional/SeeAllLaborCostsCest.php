<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class SeeAllLaborCostsCest
{
	private $manager;

	public function _before(FunctionalTester $I)
    {
	    $this->manager = $I->signInAsManager();
    }

    // tests
    public function try_to_see_all_labor_cost(FunctionalTester $I)
    {
	    $laborCosts = $I->haveTimes('labor_cost', 5, [
		   'br_id' => $this->manager->employee->br_id
	    ]);

	    $I->am('a manager');

	    $I->wantTo('see all labor cost');

	    $I->amOnPage(LaborCostsPage::$URL);

	    foreach($laborCosts as $labor) {
		    $I->see($labor->type);
	    }
    }
}
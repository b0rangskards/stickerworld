<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class DeleteLaborCostCest
{

	private $manager;

	private $laborCost;

    public function _before(FunctionalTester $I)
    {
	    $this->manager = $I->signInAsManager();

	    $this->laborCost = $I->have('labor_cost', [
		    'br_id' => $this->manager->employee->br_id
	    ]);
    }

    // tests
    public function try_to_delete_labor_cost(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('add labor cost');

	    $I->amOnPage(LaborCostsPage::$URL);

	    $I->seeRecord(LaborCostsPage::$tableName, [
		    'id' => $this->laborCost->id
	    ]);

	    $I->sendAjaxRequest('DELETE', URL::route('delete_labor_cost_path', $this->laborCost->id));

		$I->seeResponseCodeIs(200);

	    $I->dontSeeRecord(LaborCostsPage::$tableName, [
		    'id' => $this->laborCost->id
	    ]);
    }
}
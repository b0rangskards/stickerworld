<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewLaborCostCest
{
	private $manager;

	private $newLaborCostData;

    public function _before(FunctionalTester $I)
    {
	    $this->newLaborCostData = $I->buildDataFor('labor_cost');

	    $this->manager = $I->signInAsManager();
    }

    // tests
    public function try_to_add_labor_cost(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('add labor cost');

	    $I->amOnPage(LaborCostsPage::$URL);

	    $I->click(LaborCostsPage::$newLaborCostButton);

	    $I->seeCurrentRouteIs('new_labor_cost_path');

		$I->fillField(NewLaborCostPage::$laborTypeField, $this->newLaborCostData['type']);

	    $I->fillField(NewLaborCostPage::$rateField, $this->newLaborCostData['rate']);

	    $I->fillField(NewLaborCostPage::$remarksField, $this->newLaborCostData['remarks']);

	    $I->click(NewLaborCostPage::$submitButton);

	    $I->amOnRoute('labor_costs_index_path');

	    $I->see(NewLaborCostPage::$successMessage);

	    $I->see(ucwords($this->newLaborCostData['type']));

	    $I->seeRecord(LaborCostsPage::$tableName, [
		    'br_id' => $this->manager->employee->br_id,
		    'type' => strtolower($this->newLaborCostData['type']),
		    'rate' => strtolower($this->newLaborCostData['rate'])
	    ]);
    }
}
<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdateLaborCostCest
{
	private $manager;

	private $laborCost;

	private $newLaborCostData;

	public function _before(FunctionalTester $I)
    {
	    $this->manager = $I->signInAsManager();

	    $this->newLaborCostData = $I->buildDataFor('labor_cost');

	    $this->laborCost = $I->have('labor_cost', [
		    'br_id' => $this->manager->employee->br_id
	    ]);
    }

    // tests
    public function try_to_update_labor_cost(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('add labor cost');

	    $I->amOnPage(LaborCostsPage::$URL);

	    $I->amOnPage(UpdateLaborCostPage::route($this->laborCost->id));

	    $I->seeInCurrentUrl(UpdateLaborCostPage::route($this->laborCost->id));

	    $I->seeInField(UpdateLaborCostPage::$laborTypeField, $this->laborCost->type);

	    $I->seeInField(UpdateLaborCostPage::$rateField, $this->laborCost->rate);

	    $I->fillField(UpdateLaborCostPage::$laborTypeField, $this->newLaborCostData['type']);

	    $I->fillField(UpdateLaborCostPage::$rateField, $this->newLaborCostData['rate']);

	    $I->fillField(UpdateLaborCostPage::$remarksField, $this->newLaborCostData['remarks']);

	    $I->click(UpdateLaborCostPage::$submitButton);

	    $I->amOnRoute('labor_costs_index_path');

	    $I->see(UpdateLaborCostPage::$successMessage);

	    $I->see(ucwords($this->newLaborCostData['type']));

	    $I->seeRecord(LaborCostsPage::$tableName, [
		    'br_id' => $this->manager->employee->br_id,
		    'type' => strtolower($this->newLaborCostData['type']),
		    'rate' => strtolower($this->newLaborCostData['rate']),
		    'remarks' => strtolower($this->newLaborCostData['remarks'])
	    ]);
    }
}
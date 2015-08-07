<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdateLogisticsCostCest
{

	private $manager;

	private $logisticsCost;

	private $newLogisticsCostData;

    public function _before(FunctionalTester $I)
    {
	    $this->manager = $I->signInAsManager();

	    $this->newLogisticsCostData = $I->buildDataFor('logistics_cost');

	    $this->logisticsCost = $I->have('labor_cost', [
		    'br_id' => $this->manager->employee->br_id
	    ]);
    }

    // tests
    public function try_to_update_logistics_cost(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('add logistics cost');

	    $I->amOnPage(LogisticsCostsPage::$URL);

	    $I->amOnPage(UpdateLogisticsCostPage::route($this->logisticsCost->id));

	    $I->seeInCurrentUrl(UpdateLogisticsCostPage::route($this->logisticsCost->id));

	    $I->seeInField(UpdateLogisticsCostPage::$typeField, $this->logisticsCost->type);

	    $I->seeInField(UpdateLogisticsCostPage::$rateField, $this->logisticsCost->rate);

	    $I->fillField(UpdateLogisticsCostPage::$typeField, $this->newLogisticsCostData['type']);

	    $I->fillField(UpdateLogisticsCostPage::$rateField, $this->newLogisticsCostData['rate']);

	    $I->fillField(UpdateLogisticsCostPage::$remarksField, $this->newLogisticsCostData['remarks']);

	    $I->click(UpdateLogisticsCostPage::$submitButton);

	    $I->amOnRoute('labor_costs_index_path');

	    $I->see(UpdateLogisticsCostPage::$successMessage);

	    $I->see(ucwords($this->newLogisticsCostData['type']));

	    $I->seeRecord(LogisticsCostsPage::$tableName, [
		    'br_id' => $this->manager->employee->br_id,
		    'type' => strtolower($this->newLogisticsCostData['type']),
		    'rate' => strtolower($this->newLogisticsCostData['rate']),
		    'remarks' => strtolower($this->newLogisticsCostData['remarks'])
	    ]);
    }
}
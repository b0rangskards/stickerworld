<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewLogisticsCostCest
{
	private $manager;

	private $newLogisticsCostData;

    public function _before(FunctionalTester $I)
    {
	    $this->newLogisticsCostData = $I->buildDataFor('logistics_cost');

	    $this->manager = $I->signInAsManager();
    }

    // tests
    public function try_to_add_logistics_cost(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('add logistics cost');

	    $I->amOnPage(LogisticsCostsPage::$URL);

	    $I->click(LogisticsCostsPage::$newLogisticsCostButton);

	    $I->seeCurrentRouteIs('new_logistics_cost_path');

	    $I->fillField(NewLogisticsCostPage::$typeField, $this->newLogisticsCostData['type']);

	    $I->fillField(NewLogisticsCostPage::$rateField, $this->newLogisticsCostData['rate']);

	    $I->fillField(NewLogisticsCostPage::$remarksField, $this->newLogisticsCostData['remarks']);

	    $I->click(NewLogisticsCostPage::$submitButton);

	    $I->amOnRoute('logistics_costs_index_path');

	    $I->see(NewLogisticsCostPage::$successMessage);

	    $I->see(ucwords($this->newLogisticsCostData['type']));

	    $I->seeRecord(LogisticsCostsPage::$tableName, [
		    'br_id' => $this->manager->employee->br_id,
		    'type' => strtolower($this->newLogisticsCostData['type']),
		    'rate' => strtolower($this->newLogisticsCostData['rate'])
	    ]);
    }
}
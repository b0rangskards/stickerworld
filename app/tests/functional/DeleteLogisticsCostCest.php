<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class DeleteLogisticsCostCest
{

	private $manager;

	private $laborCost;

	public function _before(FunctionalTester $I)
	{
		$this->manager = $I->signInAsManager();

		$this->logisticsCost = $I->have('logistics_cost', [
			'br_id' => $this->manager->employee->br_id
		]);
	}

    // tests
    public function try_to_delete_logistics_cost(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('add logistics cost');

	    $I->amOnPage(LogisticsCostsPage::$URL);

	    $I->seeRecord(LogisticsCostsPage::$tableName, [
		    'id' => $this->logisticsCost->id
	    ]);

	    $I->sendAjaxRequest('DELETE', URL::route('delete_logistics_cost_path', $this->logisticsCost->id));

	    $I->seeResponseCodeIs(200);

	    $I->dontSeeRecord(LogisticsCostsPage::$tableName, [
		    'id' => $this->logisticsCost->id
	    ]);
    }
}
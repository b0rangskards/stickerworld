<?php
use \AcceptanceTester;

/**
 * @guy AcceptanceTester\MemberSteps
 */
class AddMaterialToNewProjectCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
	    /* Sign In */
	    $I->signInAsManager();

	    /* Interact with Menu */
		$I->goToNewProjectPage($I);

	    /* Add Material to New Project */
	    $this->addMaterial($I);
    }

	private function goToNewProjectPage($I)
	{
		$I->click(SideMenuPage::$projectsLink);
		$I->click(SideMenuPage::$newProjectLink);
	}

	private function addMaterial($I)
	{
		$I->click(NewProjectPage::$addMaterialLink);
		$I->waitForElementVisible('span.select2-arrow');
		$I->click('span.select2-arrow');
		$I->click('.select2-highlighted');

		$qty = 5;

		$I->fillField('.item-project-qty', $qty);

		$total = $I->computeLineTotal($I->grabTextFrom('.unit-price-label'), $qty);
		$contingencies = $I->computeCongencies($total);
		$totalCost = $I->computeTotalCost($total, $contingencies);

		$I->see($total, '.total-amount-label');

		$I->click('.add-item-to-project-btn');

		$I->wait(3);

		$I->see(number_format($total, 2), NewProjectPage::$subTotalAmount);

		$I->see(number_format($contingencies, 2), NewProjectPage::$contingenciesAmount);

		$I->see(number_format($totalCost, 2), NewProjectPage::$totalCostAmount);
	}
}
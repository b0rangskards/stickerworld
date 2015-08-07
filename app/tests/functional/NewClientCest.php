<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewClientCest
{
	private $manager;

	private $newClientData;

    public function _before(FunctionalTester $I)
    {
	    $this->manager = $I->signInAsManager();

	    $this->newClientData = $I->buildDataFor('Client');
    }

    // tests
    public function try_to_add_new_client(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('add new client');

	    $I->amOnPage(NewClientPage::$URL);

	    $I->fillField(NewClientPage::$nameField, $this->newClientData['name']);

	    $I->fillField(NewClientPage::$addressField, $this->newClientData['address']);

	    $I->fillField(NewClientPage::$contactNoField, $this->newClientData['contact_no']);

	    $I->click(NewClientPage::$submitButton);

	    $I->seeCurrentUrlEquals(ClientsIndexPage::$URL);

	    $I->see(NewClientPage::$successMessage);

		$I->see(ucwords($this->newClientData['name']));

	    $I->seeRecord( ClientsIndexPage::$tableName, [
		    'br_id' => $this->manager->employee->br_id,
		    'name' => strtolower($this->newClientData['name']),
		    'contact_no' => $this->newClientData['contact_no']
	    ]);
    }
}
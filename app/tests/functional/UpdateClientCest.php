<?php
use Acme\Helpers\InputConverter;
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdateClientCest
{
	private $manager;

	private $client;

	private $newClientData;

    public function _before(FunctionalTester $I)
    {
	    $this->manager = $I->signInAsManager();

	    $this->client = $I->have('Client', [
		   'br_id' => $this->manager->employee->br_id
	    ]);

	    $this->newClientData = $I->buildDataFor('Client');
    }

    // tests
    public function try_to_update_client(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('update client information');

	    $I->amOnPage(UpdateClientPage::route($this->client->id));

	    $I->fillField(UpdateClientPage::$nameField, $this->newClientData['name']);

	    $I->fillField(UpdateClientPage::$addressField, $this->newClientData['address']);

	    $I->fillField(UpdateClientPage::$contactNoField, $this->newClientData['contact_no']);

	    $I->click(UpdateClientPage::$submitButton);

	    $I->seeCurrentUrlEquals(ClientsIndexPage::$URL);

	    $I->see(UpdateClientPage::$successMessage);

	    $I->see(strtolower($this->newClientData['name']));

	    $I->seeRecord(ClientsIndexPage::$tableName, [
		    'id' => $this->client->id,
		    'br_id' => $this->manager->employee->br_id,
		    'name' => strtolower($this->newClientData['name']),
		    'address' => InputConverter::cleanInput($this->newClientData['address']),
		    'contact_no' => $this->newClientData['contact_no']
	    ]);
    }
}
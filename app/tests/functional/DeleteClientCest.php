<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class DeleteClientCest
{

	private $manager;

	private $client;


    public function _before(FunctionalTester $I)
    {
	    $this->manager = $I->signInAsManager();

	    $this->client = $I->have('Client', [
		    'br_id' => $this->manager->employee->br_id
	    ]);
    }

    // tests
    public function try_to_delete_client(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('delete client');

	    $I->amOnPage(ClientsIndexPage::$URL);

	    $I->sendAjaxRequest('DELETE', URL::route('delete_client_path', $this->client->id));

	    $I->seeResponseCodeIs(200);

	    $I->dontSeeRecord(ClientsIndexPage::$tableName, [
		   'id' => $this->client->id,
		   'name' => $this->client->name
	    ]);
    }
}
<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class DeleteItemCest
{
	private $item;
	private $supplier;

	public function _before(FunctionalTester $I)
    {
	    $this->manager = $I->signInAsManager();

	     $this->supplier = $I->have('Supplier', [
		    'br_id' => $this->manager->employee->br_id
	    ]);

	    $this->item = $I->have('Item', [
		    'supplier_id' => $this->supplier->id
	    ]);
    }

    // tests
    public function try_to_delete_suppliers_item(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('delete item');

	    $I->amOnPage(ShowSupplierPage::route($this->supplier->id));

	    $I->sendAjaxRequest('DELETE',
		    URL::route('delete_item_path', $this->item->id));

	    $I->seeResponseCodeIs(200);

	    $I->dontSeeRecord('items', [
		   'id' => $this->item->id
	    ]);
    }
}
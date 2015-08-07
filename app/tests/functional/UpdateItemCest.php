<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdateItemCest
{
	private $manager;

	private $supplier;

	private $item;

	public function _before(FunctionalTester $I)
    {
	    $this->manager = $I->signInAsManager();

	    $this->supplier = $I->have('Supplier', [
		    'br_id' => $this->manager->employee->br_id
	    ]);

	    $this->item = $I->Have('Item', [
		    'supplier_id' => $this->supplier->id
	    ]);
    }
    // tests
    public function try_to_update_item(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('update item');

	    $I->amOnPage(ShowSupplierPage::route($this->supplier->id));

	    $newItemData = $I->buildDataFor('Item');

	    $I->sendAjaxRequest('POST',
		    URL::route('update_item_path', $this->supplier->id),
		    [
			    'id' => $this->item->id,
			    'name' => $newItemData['name'],
			    'details' => $newItemData['details'],
			    'type' => $newItemData['type'],
			    'unit_of_measure' => $newItemData['unit_of_measure'],
			    'unit_price' => $newItemData['unit_price'],
			    'remarks' => $newItemData['remarks']
		    ]);

	    $I->seeResponseCodeIs(200);

	    $I->seeRecord('items', [
		    'supplier_id' => $this->supplier->id,
		    'name' => strtolower($newItemData['name']),
		    'details' => strtolower($newItemData['details']),
		    'type' => strtolower($newItemData['type']),
		    'unit_of_measure' => strtolower($newItemData['unit_of_measure']),
		    'unit_price' => strtolower($newItemData['unit_price']),
		    'remarks' => strtolower($newItemData['remarks'])
	    ]);
    }

	/*
	 * @after try_to_update_item
	 *
	 */
	public function try_to_update_item_on_items_index_page(FunctionalTester $I)
	{
		$I->am('a manager');

		$I->wantTo('update item');

		$I->amOnPage(UpdateItemPage::route($this->item->id));

		$newItemData = $I->buildDataFor('Item');

		$I->fillField(UpdateItemPage::$nameField, $newItemData['name']);

		$I->selectOption(UpdateItemPage::$typeSelect, $newItemData['type']);

		$I->selectOption(UpdateItemPage::$unitOfMeasurSelect, $newItemData['unit_of_measure']);

		$I->fillField(UpdateItemPage::$unitPriceField, $newItemData['unit_price']);

		$I->fillField(UpdateItemPage::$detailsField, $newItemData['details']);

		$I->fillField(UpdateItemPage::$remarksField, $newItemData['remarks']);

		$I->click(UpdateItemPage::$updateButton);

		$I->seeCurrentUrlEquals(ItemsIndexPage::$URL);

		$I->see(UpdateItemPage::$successMessage);

		$I->see(ucwords($newItemData['name']));

		$I->seeRecord('items', [
			'id' => $this->item->id,
			'name' => strtolower($newItemData['name'])
		]);
	}

}
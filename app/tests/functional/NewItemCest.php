<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewItemCest
{
	private $manager;

	private $supplier;

	private $newItemData;

    public function _before(FunctionalTester $I)
    {
	    $this->manager = $I->signInAsManager();

	    $this->supplier = $I->have('Supplier', [
		    'br_id' => $this->manager->employee->br_id
	    ]);

	    $this->newItemData = $I->buildDataFor('Item', [
			'supplier_id' => $this->supplier->id
		]);
    }

    // tests
    public function try_to_add_new_suppliers_item(FunctionalTester $I)
    {
	    $I->am('a manager');

	    $I->wantTo('add new item');

	    $I->amOnPage(ShowSupplierPage::route($this->supplier->id));

	    $I->sendAjaxRequest('POST',
		    URL::route('new_item_path', $this->supplier->id), $this->newItemData);

	    $I->seeResponseCodeIs(200);

	    $I->seeRecord('items', [
		    'supplier_id' => $this->supplier->id,
		    'name' => strtolower($this->newItemData['name'])
	    ]);
    }

	/*
	 * @after try_to_add_new_suppliers_item
	 *
	 */
	public function try_to_add_new_item_on_items_index_page(FunctionalTester $I)
	{
		$this->newItemData = $I->buildDataFor('Item', [
			'supplier_id' => $this->supplier->id
		]);

		$I->am('a manager');

		$I->wantTo('add new item');

		$I->amOnPage(NewItemPage::$URL);

		$I->selectOption(NewItemPage::$supplierSelect, $this->supplier->id);

		$I->fillField(NewItemPage::$nameField, $this->newItemData['name']);

		$I->selectOption(NewItemPage::$typeSelect, $this->newItemData['type']);

		$I->selectOption(NewItemPage::$unitOfMeasurSelect, $this->newItemData['unit_of_measure']);

		$I->fillField(NewItemPage::$unitPriceField, $this->newItemData['unit_price']);

		$I->fillField(NewItemPage::$detailsField, $this->newItemData['details']);

		$I->fillField(NewItemPage::$remarksField, $this->newItemData['remarks']);

//		$I->checkOption('is_sm');

		$I->click(NewItemPage::$addButton);

		$I->seeCurrentUrlEquals(ItemsIndexPage::$URL);

		$I->see(NewItemPage::$successMessage);

		$I->see(ucwords($this->newItemData['name']));

		$I->seeRecord('items', [
			'supplier_id' => $this->supplier->id,
			'name' => strtolower($this->newItemData['name'])
		]);
	}

	/*
	 * @after try_to_add_new_item_on_items_index_page
	 *
	 */
	public function try_to_add_new_standard_material_item_on_items_index_page(FunctionalTester $I)
	{
		$this->newItemData = $I->buildDataFor('Item', [
			'supplier_id' => $this->supplier->id
		]);

		$I->am('a manager');

		$I->wantTo('add new item');

		$I->amOnPage(NewItemPage::$URL);

		$I->selectOption(NewItemPage::$supplierSelect, $this->supplier->id);

		$I->fillField(NewItemPage::$nameField, $this->newItemData['name']);

		$I->selectOption(NewItemPage::$typeSelect, $this->newItemData['type']);

		$I->selectOption(NewItemPage::$unitOfMeasurSelect, $this->newItemData['unit_of_measure']);

		$I->fillField(NewItemPage::$unitPriceField, $this->newItemData['unit_price']);

		$I->fillField(NewItemPage::$detailsField, $this->newItemData['details']);

		$I->fillField(NewItemPage::$remarksField, $this->newItemData['remarks']);

		$I->checkOption(NewItemPage::$isStandardMaterialField);

		$I->click(NewItemPage::$addButton);

		$I->seeCurrentUrlEquals(ItemsIndexPage::$URL);

		$I->see(NewItemPage::$successMessage);

		$I->see(ucwords($this->newItemData['name']));

		$I->seeRecord('items', [
			'supplier_id' => $this->supplier->id,
			'name' => strtolower($this->newItemData['name']),
			'is_sm' => 1
		]);
	}
}
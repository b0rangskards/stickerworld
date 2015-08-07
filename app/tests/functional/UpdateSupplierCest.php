<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdateSupplierCest
{
    private $manager;

    private $supplier;

    private $newSupplierData;

    private $fieldsToBeUpdated = ['name', 'supplier_type', 'address', 'email'];

    public function _before(FunctionalTester $I)
    {
        $this->manager = $I->signInAsManager();

        $this->supplier = $I->have('Supplier', [
            'br_id' => $this->manager->employee()->first()->br_id
        ]);

        $this->newSupplierData = $I->buildDataFor('Supplier');
    }

    // tests
    public function try_to_update_supplier_with_valid_data(FunctionalTester $I)
    {
        $I->am('a manager');

        $I->wantTo('update supplier with valid data');

        $I->amOnPage(SuppliersPage::$URL);

        $I->click(SuppliersPage::updateLink($this->supplier->id));

        $I->seeCurrentUrlEquals(UpdateSupplierPage::route($this->supplier->id));

        foreach ( $this->fieldsToBeUpdated as $field ) {
            if ( $field == 'supplier_type' ) {
                $I->selectOption($field, strtolower($this->newSupplierData['type']));
                continue;
            }

            $I->fillField($field, $this->newSupplierData[$field]);
        }

        $I->click(UpdateSupplierPage::$formSubmitButton);

        $I->canSeeInCurrentUrl(SuppliersPage::$URL);

        $I->see(UpdateSupplierPage::$successMessage);

        $I->see($this->newSupplierData['name']);

        $I->seeRecord(SuppliersPage::$tableName, [
            'id' => $this->supplier->id,
            'name' => strtolower($this->newSupplierData['name']),
            'type' => strtolower($this->newSupplierData['type']),
            'email' => strtolower($this->newSupplierData['email'])
        ]);
    }
}
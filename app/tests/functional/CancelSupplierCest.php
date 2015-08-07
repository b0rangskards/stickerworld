<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class CancelSupplierCest
{

    private $manager;

    private $supplier;

    public function _before(FunctionalTester $I)
    {
        $this->manager = $I->signInAsManager();

        $this->supplier = $I->have('Supplier');
    }

    // tests
    public function try_to_cancel_supplier(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('cancel supplier');

        $I->amOnPage(SuppliersPage::$URL);

        $I->see($this->supplier->name);

        $I->sendAjaxRequest('DELETE',
            URL::route('cancel_supplier_path', $this->supplier->id)
        );

        $I->seeResponseCodeIs(200);

        $I->seeRecord(SuppliersPage::$tableName, [
            'id' => $this->supplier->id,
            'name' => $this->supplier->name,
            'recstat' => 'I'
        ]);

    }
}
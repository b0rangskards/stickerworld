<?php
use \FunctionalTester;
use Illuminate\Support\Facades\URL;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewSupplierCest
{

    private $manager;

    private $supplier;

    private $contact;

    public function _before(FunctionalTester $I)
    {
        $contactNos = Config::get('enums.contact_no');
        $contactTypes = Config::get('enums.company_type');


        $this->supplier = $I->buildDataFor('Supplier');

        $this->contact = $I->buildDataFor('Contact', [
            'contactable_type' => 'Supplier'
        ]);

        $this->supplier['contact_no'] = '09235615455';
        $this->supplier['contact_type'] = $this->contact['type'];

        $this->manager = $I->signInAsManager();
    }

    // tests
    public function try_to_add_new_supplier_with_valid_data(FunctionalTester $I)
    {
        $I->am('a manager');

        $I->wantTo('add new supplier');

        $I->amOnPage(SuppliersPage::$URL);

        $I->click(SuppliersPage::$newSupplierButton);

        $I->seeCurrentRouteIs('new_supplier_path');

        $this->fillForm($I, $this->supplier);

        $I->amOnRoute('suppliers_index_path');

        $I->see(strtolower($this->supplier['name']));

        $I->seeRecord(SuppliersPage::$tableName, [
            'br_id'=> $this->manager->employee()->first()->br_id,
            'name' => strtolower($this->supplier['name']),
            'type' => strtolower($this->supplier['type'])
        ]);
    }

    /*
     * @after try_to_add_new_supplier_with_valid_data
     *
     */
    public function try_to_add_new_supplier_with_existing_name(FunctionalTester $I)
    {
        $existingSupplierModel  = $I->have('Supplier');

        $existingSupplier = $existingSupplierModel->toArray();
        $existingSupplier['contact_no'] = '0943435353';

        $I->am('a manager');

        $I->wantTo('add new supplier with existing data');

        $I->expect('an error');

        $I->amOnPage(SuppliersPage::$URL);

        $I->click(SuppliersPage::$newSupplierButton);

        $I->seeCurrentRouteIs('new_supplier_path');

        $I->seeExceptionThrown('Laracasts\Validation\FormValidationException', function () use ($I, $existingSupplier) {

            $this->fillForm($I, $existingSupplier);

            $I->seeCurrentUrlEquals(NewSupplierPage::$URL);

            $I->see('The name has already been taken.');
        });
    }

/*TODO
 * @after try_to_add_new_supplier_with_existing_name
 *
 */
//    public function try_to_add_new_supplier_with_multiple_contacts(FunctionalTester $I)
//    {
//        $contacts = [];
//
//        foreach(range(1,3) as $ctr)
//        {
//            $contacts[] = $I->buildDataFor('Contact');
//        }
//
//        $contactNos = array_column($contacts, 'number');
//        $contactTypes = array_column($contacts, 'type');
//
//        $I->am('a manager');
//
//        $I->wantTo('add new supplier with existing data');
//
//        $I->expect('an error');
//
//        $I->amOnPage(SuppliersPage::$URL);
//
//        $I->click(SuppliersPage::$newSupplierButton);
//
//        $I->seeCurrentRouteIs('new_supplier_path');
//
//        $I->sendAjaxPostRequest(URL::route('new_supplier_path'), [
//            'name'              =>      $this->supplier['name'],
//            'supplier_type'     =>      $this->supplier['type'],
//            'address'           =>      $this->supplier['address'],
//            'email'             =>      $this->supplier['email'],
//            'contact_no'      =>      $contactNos
////            'contact_type[]'    =>      $contactTypes
//        ]);
//
//
//        $I->amOnRoute('suppliers_index_path');
//
//        $I->see(strtolower($this->supplier['name']));
//
////        $I->seeRecord(SuppliersPage::$tableName, [
////            'br_id' => $this->manager->employee()->first()->br_id,
////            'name' => strtolower($this->supplier['name']),
////            'type' => strtolower($this->supplier['type'])
////        ]);
//    }

    /**
     * @param FunctionalTester $I
     */
    protected function fillForm(FunctionalTester $I, $supplier)
    {

        $I->fillField(NewSupplierPage::$nameField, $supplier['name']);

        $I->selectOption(NewSupplierPage::$supplierTypeOptionField, $supplier['type']);

        $I->fillField(NewSupplierPage::$addressField, $supplier['address']);

        $I->fillField(NewSupplierPage::$emailField, $supplier['email']);

        $I->fillField(NewSupplierPage::$contactNoField, $supplier['contact_no']);

        // Error
//        $I->selectOption(NewSupplierPage::$contactTypeOptionField, $supplier['contact_type']);

        $I->click(NewSupplierPage::$formSubmitButton);
    }
}
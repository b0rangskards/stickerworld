<?php  namespace Acme\Forms; 

use Config;
use Input;
use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;
use Supplier;

class NewSupplierForm extends FormValidator {

    /**
     * Validation rules for new supplier form.
     *
     * @var array
     */
    protected $rules = [

        'name'          => 'required|company_name|unique:suppliers',
        'supplier_type' => 'required',
        'address'       => 'required',
        'email'         => 'email'

    ];

    /**
     * Validate the form data
     *
     * @param  mixed $formData
     * @return mixed
     * @throws FormValidationException
     */
    public function validate($formData)
    {
        $formData = $this->normalizeFormData(Input::only('name', 'supplier_type', 'address', 'email'));
        $this->validation = $this->validator->make(
            $formData,
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        if ( $this->validation->fails() ) {
            throw new FormValidationException('Validation failed', $this->getValidationErrors());
        }


        $supplierName = strtolower($formData['name']);
        $supplierType = strtolower($formData['supplier_type']);

//	    $supplier = Supplier::find($formData['supplier_id']);
//
//	    // Check supplier name exist
//        if ( $supplier->name !== $supplierName ) {
//            $checkSupplier = Supplier::checkNameAndType($supplierName, $supplierType)->first();
//            if ( !is_null($checkSupplier) ) {
//                throw new FormValidationException('Validation failed', ['name' => 'Supplier already exists.']);
//            }
//        }

        // validate supplier type
        $suppType = ucfirst($supplierType);
        if( !in_array($suppType, Config::get('enums.supplier_type'))) {
            throw new FormValidationException('Validation failed', ['supplier_type' => 'Invalid Supplier Type.']);
        }

        // validate contact nos
//        $contactNos = $formData['contact_no'];
//        foreach($contactNos as $value) {
//            if( empty($value)){
//                throw new FormValidationException('Validation failed', ['contact_no' => 'The contact number is required.']);
//            }
//            else if( !preg_match('/^([0-9\s\-\+\(\)]*)$/', $value))
//            {
//                throw new FormValidationException('Validation failed', ['contact_no' => 'The contact number is not a valid format.']);
//            }
//        }

        // validate contact type
//        $contactTypes = $formData['contact_type'];
//        foreach ( $contactTypes as $value ) {
//            if ( !in_array($value, Config::get('enums.contact_type'))) {
//                throw new FormValidationException('Validation failed', ['contact_type' => 'The contact type is invalid.']);
//            }
//        }

        return true;
    }
} 
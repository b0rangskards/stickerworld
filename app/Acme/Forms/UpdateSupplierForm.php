<?php  namespace Acme\Forms; 

use Config;
use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;
use Supplier;

class UpdateSupplierForm extends FormValidator {

    /**
     * Validation rules for the update supplier form.
     *
     * @var array
     */
    protected $rules = [

        'supplier_id' => 'required|numeric|exists:suppliers,id',
        'supplier_type' => 'required',
        'address' => 'required',
        'email' => 'email'

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
        $formData = $this->normalizeFormData($formData);
        $this->validation = $this->validator->make(
            $formData,
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        if ( $this->validation->fails() ) {
            throw new FormValidationException('Validation failed', $this->getValidationErrors());
        }

        $supplier = Supplier::find($formData['supplier_id']);

        // Check supplier name exist
        $supplierName = strtolower($formData['name']);
        $supplierType = strtolower($formData['supplier_type']);

        if($supplier->name !== $supplierName) {
            $checkSupplier = Supplier::checkNameAndType($supplierName, $supplierType)->first();
            if(!is_null($checkSupplier)) {
                throw new FormValidationException('Validation failed', ['name' => 'Supplier already exists.']);
            }
        }

        // validate supplier type
        $suppType = ucfirst($supplierType);
        if ( !in_array($suppType, Config::get('enums.supplier_type')) ) {
            throw new FormValidationException('Validation failed', ['supplier_type' => 'Invalid Supplier Type.']);
        }

//        // validate contact nos
//        $contactNos = $formData['contact_no'];
//        $hasContactNo = false;
//        foreach ( $contactNos as $value ) {
//            if ( empty($value) && !$hasContactNo ) {
//                throw new FormValidationException('Validation failed', ['contact_no' => 'The contact number is required.']);
//            } else if ( !preg_match('/^([0-9\s\-\+\(\)]*)$/', $value) ) {
//                throw new FormValidationException('Validation failed', ['contact_no' => 'The contact number is not a valid format.']);
//            }
//            $hasContactNo = true;
//        }
//
//        // validate contact type
//        $contactTypes = $formData['contact_type'];
//        if($hasContactNo)
//        {
//            foreach ( $contactTypes as $value ) {
//                if ( !in_array($value, Config::get('enums.contact_type')) ) {
//                    throw new FormValidationException('Validation failed', ['contact_type' => 'The contact type is invalid.']);
//                }
//            }
//        }


        return true;
    }

} 
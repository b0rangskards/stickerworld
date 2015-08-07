<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class CancelSupplierForm extends FormValidator {


    /**
     * Validation rules for cancelling supplier.
     *
     * @var array
     */
    protected $rules = [

        'id' => 'required|numeric|exists:suppliers',

    ];
} 
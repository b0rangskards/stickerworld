<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class TerminateEmployeeForm extends FormValidator {

    /**
     * Validation rules for terminating employee.
     *
     * @var array
     */
    protected $rules = [

        'id' => 'required|numeric|exists:employees',

    ];
} 
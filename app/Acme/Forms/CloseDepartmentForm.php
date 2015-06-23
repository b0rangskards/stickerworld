<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class CloseDepartmentForm extends FormValidator {

    /**
     * Validation rules for the closing a department.
     *
     * @var array
     */
    protected  $rules = [

        'id' => 'required|numeric|exists:departments'

    ];
} 
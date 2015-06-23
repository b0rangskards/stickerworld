<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class AddNewDepartmentForm extends FormValidator {

    /**
     * Validation rules for the add new department form.
     *
     * @var array
     */
    protected $rules = [

        'name' => 'required|min:3|unique:departments',

    ];
} 
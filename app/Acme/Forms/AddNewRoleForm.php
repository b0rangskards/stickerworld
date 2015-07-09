<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class AddNewRoleForm extends FormValidator {

    /**
     * Validation rules for the add new department form.
     *
     * @var array
     */
    protected $rules = [

        'name' => 'required|between:3,20|alpha_spaces|unique:roles',

        'description' => 'min:5'

    ];
} 
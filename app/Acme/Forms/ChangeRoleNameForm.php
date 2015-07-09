<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class ChangeRoleNameForm extends FormValidator {

    /**
     * Validation rules for the change role name form.
     *
     * @var array
     */
    protected $rules = [

        'id' => 'required|numeric|exists:roles',

        'name' => 'required|between:3,20|alpha_spaces|unique:roles'

    ];
} 
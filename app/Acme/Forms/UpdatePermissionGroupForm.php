<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class UpdatePermissionGroupForm extends FormValidator {

    /**
     * Validation rules for the update permision group name form.
     *
     * @var array
     */
    protected $rules = [

        'id' => 'required|numeric|exists:permission_groups',

        'name' => 'required|between:5,30|alpha_spaces|unique:permission_groups'

    ];
} 
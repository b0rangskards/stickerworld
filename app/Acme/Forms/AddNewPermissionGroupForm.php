<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class AddNewPermissionGroupForm extends FormValidator {

    /**
     * Validation rules for the add new permission group form.
     *
     * @var array
     */
    protected $rules = [

        'name' => 'required|between:5,30|alpha_spaces|unique:permission_groups'

    ];
} 
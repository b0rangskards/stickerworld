<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class AddNewPermissionForm extends FormValidator {

    /**
     * Validation rules for the add new permission form.
     *
     * @var array
     */
    protected $rules = [

        'group_id'    => 'required|numeric|exists:permission_groups,id',
        'name'        => 'required|between:5,30|unique:permissions',
        'route'       => 'required|unique:permissions',
        'description' => 'min:5'

    ];
} 
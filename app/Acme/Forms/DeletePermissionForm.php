<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class DeletePermissionForm extends FormValidator {

    /**
     * Validation rules for deleting a permission.
     *
     * @var array
     */
    protected $rules = [

        'id' => 'required|numeric|exists:permissions'

    ];


} 
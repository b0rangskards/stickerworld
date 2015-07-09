<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class DeleteRoleForm extends FormValidator {

    /**
     * Validation rules for deleting a role.
     *
     * @var array
     */
    protected $rules = [

        'id' => 'required|numeric|exists:roles'

    ];

} 
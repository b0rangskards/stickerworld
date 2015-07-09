<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class DeletePermissionGroupForm extends FormValidator {

    /**
     * Validation rules for deleting a permission group.
     *
     * @var array
     */
    protected $rules = [

        'id' => 'required|numeric|exists:permission_groups'

    ];
} 
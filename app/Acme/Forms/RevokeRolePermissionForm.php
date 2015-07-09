<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class RevokeRolePermissionForm extends FormValidator {

    /**
     * Validation rules for the revoke permission from role form.
     *
     * @var array
     */
    protected $rules = [

        'id' => 'required|numeric|exists:permission_role'

    ];

} 
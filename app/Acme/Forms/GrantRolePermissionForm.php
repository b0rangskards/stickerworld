<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;
use PermissionRole;

class GrantRolePermissionForm extends FormValidator {

    /**
     * Validation rules for the add new permission role form.
     *
     * @var array
     */
    protected $rules = [

        'permission_id' => 'required|numeric|exists:permissions,id',
        'role_id'       => 'required|numeric|exists:roles,id'

    ];


    /**
     * Validate the form data
     *
     * @param  mixed $formData
     * @return mixed
     * @throws FormValidationException
     */
    public function validate($formData)
    {
        $formData = $this->normalizeFormData($formData);
        $this->validation = $this->validator->make(
            $formData,
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        $permissionRole = PermissionRole::where('role_id', $formData['role_id'])
                                    ->where('permission_id', $formData['permission_id'])
                                    ->get();

        if ( !$permissionRole->isEmpty() ) {
            $error = ['error' => ['Permission already granted.']];

            throw new FormValidationException('Validation failed', $error);
        }

        if ( $this->validation->fails() ) {
            throw new FormValidationException('Validation failed', $this->getValidationErrors());
        }

        return true;
    }
} 
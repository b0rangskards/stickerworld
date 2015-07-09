<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;
use Permission;

class UpdatePermissionForm extends FormValidator {

    /**
     * Validation rules for the update branch information form.
     *
     * @var array
     */
    protected $rules = [

        'name'        => 'required|between:5,30',
        'group_id'    => 'required|numeric|exists:permission_groups,id',
        'route'       => 'required',
        'description' => 'min:5'

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

        $permission = Permission::find($formData['id']);

        $result = Permission::whereRaw('name = ? and name != ?', [$formData['name'], $permission->name])->get();

        if ( !$result->isEmpty() ) {
            $error = ['name' => ['The name is taken']];

            throw new FormValidationException('Validation failed', $error);
        }

        $result = Permission::whereRaw('route = ? and route != ?', [$formData['route'], $permission->route])->get();

        if ( !$result->isEmpty() ) {
            $error = ['route' => ['The route is taken']];

            throw new FormValidationException('Validation failed', $error);
        }

        if ( $this->validation->fails() ) {
            throw new FormValidationException('Validation failed', $this->getValidationErrors());
        }

        return true;
    }
} 
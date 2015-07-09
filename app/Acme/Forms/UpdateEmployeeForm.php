<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class UpdateEmployeeForm extends FormValidator {

    /**
     * Validation rules for the update department form.
     *
     * @var array
     */
    protected $rules = [

        'firstname'      => 'required|alpha_spaces',
        'middlename'     => 'required|alpha_spaces',
        'lastname'       => 'required|alpha_spaces',
        'gender'         => 'required|alpha|gender',
        'birthdate'      => 'required|date|date_format:Y-m-d|before:now',
        'address'        => 'required',
        'employee_photo' => 'mimes:jpeg,png',
        'designation'    => 'required|alpha_spaces',
        'hired_date'     => 'required|date|date_format:Y-m-d',
        'role_id'        => 'required_if:create_account,checked|exists:roles,id'

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

        $department = Department::find($formData['id']);

        $result = Department::whereRaw('name = ? and name != ?', [$formData['name'], $department->name])->get();

        if ( !$result->isEmpty() ) {
            $error = ['name' => ['The name is taken']];

            throw new FormValidationException('Validation failed', $error);
        }

        if ( $this->validation->fails() ) {
            throw new FormValidationException('Validation failed', $this->getValidationErrors());
        }

        return true;
    }

} 
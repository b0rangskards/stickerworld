<?php  namespace Acme\Forms; 

use Department;
use Illuminate\Support\Facades\Log;
use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;

class UpdateDepartmentForm extends FormValidator {

    /**
     * Validation rules for the update department form.
     *
     * @var array
     */
    protected $rules = [

        'id'   => 'required|exists:departments',
        'name' => 'required|min:3'
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
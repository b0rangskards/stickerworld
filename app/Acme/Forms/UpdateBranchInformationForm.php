<?php  namespace Acme\Forms; 

use Branch;
use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;
use Log;

class UpdateBranchInformationForm extends FormValidator {

    /**
     * Validation rules for the update branch information form.
     *
     * @var array
     */
    protected $rules = [

        'id' => 'required|exists:branches',
        'name' => 'required|min:3',
        'address' => 'required|min:10',
        'contact_no' => 'required|min:3|regex:/^([0-9\s\-\+\(\)]*)$/',
        'lat' => 'numeric',
        'lng' => 'numeric'

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

        $branch = Branch::find($formData['id']);

        $result = Branch::whereRaw('name = ? and name != ?', [$formData['name'], $branch->name])->get();

        if(!$result->isEmpty()) {
            $error = ['name' => ['The name is taken']];

            throw new FormValidationException('Validation failed', $error);
        }

        if ( $this->validation->fails() ) {
            throw new FormValidationException('Validation failed', $this->getValidationErrors());
        }

        return true;
    }

} 
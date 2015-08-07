<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;
use Log;

class NewProjectForm extends FormValidator {


	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules = [

		'client'            => 'required|integer|exists:clients,id',
		'salesrep'          => 'required|integer|exists:employees,id',
		'estimator'         => 'required|integer|exists:employees,id',
		'name'              => 'required|min:3|unique:projects',
		'location'          => 'min:3',
		'leadTime'          => 'required|numeric|min:1',
		'deadline'          => 'required|date|date_format:Y-m-d|after:now',
		'currentDate'       => 'required|date|date_format:Y-m-d',
		'cost_multiplier'    => 'required|numeric|min:1'

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

		if ( $this->validation->fails() ) {
			throw new FormValidationException('Validation failed', $this->getValidationErrors());
		}

		if(count($formData['items']) < 1){
			throw new FormValidationException('Validation failed', ['error' => 'Must have atleast 1 material.']);
		}

		if ( count($formData['labors']) < 1 ) {
			throw new FormValidationException('Validation failed', ['error' => 'Must have atleast 1 laborer.']);
		}

		return true;
	}

} 
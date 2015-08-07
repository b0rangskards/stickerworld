<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;
use Log;

class NewProjectHeaderFieldsForm extends FormValidator {

	private $validationRules = [];

	private $nameRules = [
		'value' => 'required|min:3|unique:projects,name'
	];

	private $leadTimeRules = [
		'value' => 'required|integer|min:1'
	];

	private $locationRules  = [
		'value' => 'required|min:5'
	];

	private $clientRules = [
		'value' => 'required|integer|exists:clients,id'
	];

	private $salesRepRules = [
		'value' => 'required|integer|exists:employees,id'
	];

	private $currentDateRules = [
		'value' => 'required|date'
	];

	private $deadlineRules = [
		'value' => 'required|date'
	];

	private $estimatorRules = [
		'value' => 'required|integer|exists:employees,id'
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
		Log::info($formData);

		$formData = $this->normalizeFormData($formData);

		$this->validationRules = $this->validationRules($formData);

		$this->validation = $this->validator->make(
			$formData,
			$this->validationRules,
			$this->getValidationMessages()
		);

		if ( $this->validation->fails() ) {
			throw new FormValidationException('Validation failed', $this->getValidationErrors());
		}

		return true;
	}

	private function validationRules($formData)
	{
		switch ( $formData['name'] ) {
			case 'name':
				return $this->nameRules;
			case 'leadTime':
				return $this->leadTimeRules;
			case 'location':
				return $this->locationRules;
			case 'client':
				return $this->clientRules;
			case 'salesrep':
				return $this->salesRepRules;
			case 'currentDate':
				return $this->currentDateRules;
			case 'deadline':
				return $this->deadlineRules;
			case 'estimator':
				return $this->estimatorRules;
		}
		return false;
	}

} 
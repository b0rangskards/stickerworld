<?php  namespace Acme\Forms; 

use Client;
use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;

class UpdateClientForm extends FormValidator {

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules = [

		'id'      => 'required|exists:clients,id',
		'name'    => 'required|min:3',
		'address' => 'required|min:4',
		'contact_no' => 'required|min:6'

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

		// Check employee name if exist
		$client = Client::find($formData['id']);

		if ($client->name != $formData['name'] )
		{
			if( Client::where('name', $formData['name'])->count() > 0)
			{
				throw new FormValidationException('Validation failed', ['name' => ['Name already exists.']]);
			}
		}

	}


}
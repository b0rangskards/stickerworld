<?php  namespace Acme\Forms; 

use Item;
use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;

class AddNewItemForm extends FormValidator {

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules = [

		'supplier_id'     => 'required|numeric|exists:suppliers,id',
		'name'            => 'required|min:3',
		'type'            => 'required',
		'unit_of_measure' => 'required',
		'unit_price'      => 'required|numeric',
		'image'           => 'mimes:jpeg,png'

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

		$item = Item::where('name', $formData['name'])
			->where('supplier_id', $formData['supplier_id'])
			->get();

		if ( !$item->isEmpty() ) {
			$error = ['name' => ['Item already exists.']];
			throw new FormValidationException('Validation failed', $error);
		}

		return true;
	}

} 
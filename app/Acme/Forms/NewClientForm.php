<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class NewClientForm extends FormValidator {

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	protected $rules = [

		'br_id' => 'required|exists:branches,id',
		'name' => 'required|min:3|unique:clients',
		'address' => 'required|min:4',
		'contact_no' => 'required|min:6|unique:clients'

	];

} 
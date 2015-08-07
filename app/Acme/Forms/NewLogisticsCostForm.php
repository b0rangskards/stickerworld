<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class NewLogisticsCostForm extends FormValidator {

	protected $rules = [

		'type' => 'required|min:3',
		'rate' => 'required|numeric'

	];

} 
<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class UpdateLogisticsCostForm extends FormValidator {

	protected $rules = [

		'id' => 'required|integer|exists:utility_costs',
		'type' => 'required|min:3',
		'rate' => 'required|numeric'

	];
} 
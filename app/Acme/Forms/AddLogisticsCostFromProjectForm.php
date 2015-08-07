<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class AddLogisticsCostFromProjectForm extends FormValidator {

	protected $rules = [

		'type' => 'required|integer|exists:utility_costs,id',
		'no_of_deliveries' => 'required|numeric|min:1'

	];
} 
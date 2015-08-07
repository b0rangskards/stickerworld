<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class AddLaborCostFromProjectForm extends FormValidator {

	protected $rules = [

		'type' => 'required|integer|exists:utility_costs,id',
		'no_of_emp' => 'required|numeric|min:1',
		'no_of_days' => 'required|numeric|min:1'

	];

} 
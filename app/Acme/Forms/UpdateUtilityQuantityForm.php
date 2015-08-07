<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class UpdateUtilityQuantityForm extends FormValidator {

	protected $rules = [

		'id' => 'required',
		'noOfEmp' => 'required|numeric|min:0',
		'noOfDays' => 'required|numeric|min:0'

	];

} 
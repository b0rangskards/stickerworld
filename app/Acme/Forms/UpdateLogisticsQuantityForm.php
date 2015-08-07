<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class UpdateLogisticsQuantityForm extends FormValidator {

	protected $rules = [
		'id' => 'required',
		'qty' => 'required|numeric|min:0'
	];

} 
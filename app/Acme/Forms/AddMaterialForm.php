<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class AddMaterialForm extends FormValidator {

	protected $rules = [

		'item_id' => 'required|integer|exists:items,id',
		'qty'     => 'required|numeric|min:0'

	];
} 
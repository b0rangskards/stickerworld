<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class ConfirmProjectForm extends FormValidator {

	protected $rules = [
		'proj_id' => 'required|integer|exists:projects,id'
	];

} 
<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class UpdateCompanySettingsForm extends FormValidator {

	protected $rules = [

		'company_name' => 'required|min:3',
		'vat_rate' => 'required|numeric|min:1',
		'tin_no' => 'required'

	];

} 
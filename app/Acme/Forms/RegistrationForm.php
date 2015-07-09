<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {

    protected $rules = [

        'role_id' => 'required|numeric|exists:roles,id',

        'emp_id'  => 'numeric|exists:employees,id',

        'email'   => 'required|email|unique:users'

    ];

} 
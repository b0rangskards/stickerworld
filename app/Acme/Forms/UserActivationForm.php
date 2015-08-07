<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class UserActivationForm extends FormValidator {

    /**
     * Validation rules for the user validation form.
     *
     * @var array
     */
    protected $rules = [

        'username' => 'required|username|between:4,20|unique:users',

        'password' => 'required|alpha_num|min:6|confirmed',

    ];

} 
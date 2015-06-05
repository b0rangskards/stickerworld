<?php  namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator {

    /**
     * Validation rules for the sign in form.
     *
     * @var array
     */
    protected $rules = [

        'username' => 'required',

        'password' => 'required'

    ];

} 
<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class ChangeEmailForm extends FormValidator {

    /**
     * Validation rules for the change username form.
     *
     * @var array
     */
    protected $rules = [

        'email' => 'required|email|unique:users'

    ];
} 
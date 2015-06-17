<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class ChangeUsernameForm extends FormValidator {

    /**
     * Validation rules for the change username form.
     *
     * @var array
     */
    protected $rules = [

        'id'    => 'required|numeric|exists:users',

        'username' => 'required|alpha_dash|between:4,20|unique:users'

    ];
} 
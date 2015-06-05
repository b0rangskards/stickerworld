<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class ChangeEmailForm extends FormValidator {

    /**
     * Validation rules for the change username form.
     *
     * @var array
     */
    protected $rules = [

        'username' => 'required|alpha_dash|between:4,20|unique:users'

    ];
} 
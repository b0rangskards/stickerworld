<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class ChangePasswordForm extends FormValidator {

    /**
     * Validation rules for the change password form.
     *
     * @var array
     */
    protected $rules = [

        'current_password' => 'required',

        'new_password' => 'required|alpha_num|min:6|confirmed'

    ];

} 
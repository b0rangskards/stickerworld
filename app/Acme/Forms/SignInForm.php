<?php  namespace Acme\Forms;

use Auth;
use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;
use User;

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

    /**
     * Validate the form data
     *
     * @param  mixed $formData
     * @return mixed
     * @throws FormValidationException
     */
    public function validate($formData)
    {
        $formData = $this->normalizeFormData($formData);
        $this->validation = $this->validator->make(
            $formData,
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        if ( ! Auth::attempt($formData))
        {
            throw new FormValidationException('Validation failed',
                [
                    'error' => 'Invalid Username/Password.'
                ]
            );
        }

        $user = User::whereUsername($formData['username'])->first();

        if ( $user && !$user->isActive() ) {
            throw new FormValidationException('Validation failed',
                [
                    'error' => 'Invalid Username/Password.'
                ]
            );
        }

        return true;
    }

} 
<?php  namespace Acme\Forms; 

use Illuminate\Support\Facades\Hash;
use Laracasts\Validation\FormValidationException;
use Laracasts\Validation\FormValidator;
use User;

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

        $user = User::where('id', $formData['user_id'])->first();

        if ( !$user ) {
            $error = ['error' => ['User doesnt exist']];
            throw new FormValidationException('Validation failed', $error);
        }

        if ( !Hash::check($formData['current_password'], $user->password) ) {
            $error = ['current_password' => ['The current password doesnt match.']];
            throw new FormValidationException('Validation failed', $error);
        }

        if ( $this->validation->fails() ) {
            throw new FormValidationException('Validation failed', $this->getValidationErrors());
        }

        return true;
    }

} 
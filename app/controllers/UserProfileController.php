<?php

use Acme\Forms\ChangeEmailForm;
use Acme\Forms\ChangePasswordForm;
use Acme\Forms\ChangeUsernameForm;
use Acme\Users\UserProfile\ChangeEmailCommand;
use Acme\Users\UserProfile\ChangePasswordCommand;
use Acme\Users\UserProfile\ChangeUsernameCommand;
use Laracasts\Validation\FormValidationException;

class UserProfileController extends \BaseController {

    private $changePasswordForm;

    private $changeUsernameForm;

    private $changeEmailForm;

    function __construct(ChangePasswordForm $changePasswordForm, ChangeUsernameForm $changeUsernameForm, ChangeEmailForm $changeEmailForm )
    {
        $this->changeUsernameForm = $changeUsernameForm;

        $this->changePasswordForm = $changePasswordForm;

        $this->changeEmailForm = $changeEmailForm;
    }

	/**
	 * Display a listing of the resource.
	 * GET /userprofile
	 *
	 * @return Response
	 */
	public function index($username)
	{
        $user = User::whereUsername($username)->first();

        if ($user)
        {
            return View::make('user_profile.index',
                ['pageTitle' => 'Profile']
            );
        }

        return Redirect::back();
	}

    public function changeUsername($username)
    {
        try
        {

            $this->changeUsernameForm->validate(
                [
                    'id' => Input::get('pk'),
                    'username' => Input::get('value')
                ]
            );

            $this->execute(ChangeUsernameCommand::class);

            return Response::json(['message' => 'Username successfully changed.']);

        } catch(Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
    }

    public function changeEmail($username)
    {
        try {

            $this->changeEmailForm->validate(
                [
                    'id' => Input::get('pk'),
                    'email' => Input::get('value')
                ]
            );

            $this->execute(ChangeEmailCommand::class);

            return Response::json(['message' => 'Email successfully changed.']);

        } catch (Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
    }

	public function changePassword()
	{
        try {
            $this->changePasswordForm->validate(Input::all());

            $this->execute(ChangePasswordCommand::class);

            return Response::json(['message' => 'Password successfully changed.']);

        }catch( Laracasts\Validation\FormValidationException $exception) {
            $errors = [];

            if(is_object($exception->getErrors())){
                $errors = $exception->getErrors()->toArray();
            }else{
                $errors = $exception->getErrors();
            }

            return Response::json($errors, 400);
        }

	}


}
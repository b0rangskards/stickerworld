<?php

use Acme\Forms\ChangeEmailForm;
use Acme\Forms\ChangePasswordForm;
use Acme\Forms\ChangeUsernameForm;
use Acme\Users\UserProfile\ChangeEmailCommand;
use Acme\Users\UserProfile\ChangePasswordCommand;
use Acme\Users\UserProfile\ChangeUsernameCommand;

class UserProfileController extends \BaseController {

    private $changePasswordForm;

    private $changeUsernameForm;

    private $changeEmailForm;

    function __construct(ChangePasswordForm $changePasswordForm, ChangeUsernameForm $changeUsernameForm, ChangeEmailForm $changeEmailForm )
    {
        $this->changeUsernameForm = $changeUsernameForm;

        $this->changePasswordForm = $changePasswordForm;

        $this->changeEmailForm = $changeEmailForm;

        $this->beforeFilter('auth');
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

        } catch( Laracasts\Validation\FormValidationException $exception ) {

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

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
    }

	public function changePassword()
	{
        $errors = [];
        $input = Input::all();

        $user = User::findOrFail($input['user_id'])->first();

        if( !$user )
        {
            return Response::json(['error' => 'User doesnt exist'], 400);
        }

        try {
            $errors = [];
            $current_password = Input::get('current_password');
            $new_password     = Input::get('new_password');

            if( ! Hash::check($current_password, $user->password) )
            {
                $errors = ['current_password' => ['The current password is incorrect.']];
            }

            $this->changePasswordForm->validate(Input::all());

            $this->execute(ChangePasswordCommand::class);

        }catch( Laracasts\Validation\FormValidationException $exception) {

            $messages = $exception->getErrors()->toArray();

            $errors = array_merge_recursive($messages, $errors);

            return Response::json($errors, 400);
        }

	}

    /**
     * Update User Profile
     * with X-Editable
     *
     */
//    public function update()
//    {
//        $inputs = Input::all();
//
//        $user = User::findOrFail($inputs['pk']);
//
//        if ($user)
//        {
//            $value = $inputs['value'];
//            $name = $inputs['name'];
//            switch( $name )
//            {
//                case 'username':
//                    if(empty($value))
//                    {
//                        return Response::json('The username field is required', 400);
//                    }
//                    Log::info('update username ' . $user->username . ' to ' . $inputs['value']);
//                    break;
//                case 'email':
//                    if ( empty($value) ) {
//                        return Response::json('The email field is required', 400);
//                    }
//                    Log::info('update email ' . $user->email . ' to ' . $inputs['value']);
//                    break;
//                default:
//                    Log::info('Default');
//            }
//        }
//        Log::info($inputs);
//    }

//	/**
//	 * Store a newly created resource in storage.
//	 * POST /userprofile
//	 *
//	 * @return Response
//	 */
//	public function store()
//	{
//		//
//	}
//
//	/**
//	 * Display the specified resource.
//	 * GET /userprofile/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function show($id)
//	{
//		//
//	}
//
//	/**
//	 * Show the form for editing the specified resource.
//	 * GET /userprofile/{id}/edit
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function edit($id)
//	{
//		//
//	}
//
//
//
//	/**
//	 * Remove the specified resource from storage.
//	 * DELETE /userprofile/{id}
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		//
//	}

}
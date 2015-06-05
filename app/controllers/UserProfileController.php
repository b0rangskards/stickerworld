<?php

use Acme\Forms\ChangePasswordForm;

class UserProfileController extends \BaseController {

    private $changePasswordForm;

    function __construct(ChangePasswordForm $changePasswordForm)
    {
        $this->changePasswordForm = $changePasswordForm;

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


    /**
     * Update User Profile
     * with X-Editable
     *
     */
    public function update()
    {
        $inputs = Input::all();
//        dd($inputs);

        $user = User::findOrFail($inputs['pk']);

        if ($user)
        {
            $value = $inputs['value'];
            $name = $inputs['name'];
            switch( $name )
            {
                case 'username':
                    if(empty($value))
                    {
                        return Response::json('The username field is required', 400);
                    }
                    Log::info('update username ' . $user->username . ' to ' . $inputs['value']);
                    break;
                case 'email':
                    if ( empty($value) ) {
                        return Response::json('The email field is required', 400);
                    }
                    Log::info('update email ' . $user->email . ' to ' . $inputs['value']);
                    break;
                default:
                    Log::info('Default');
            }
        }
        Log::info($inputs);
    }


	public function changePassword()
	{
        $errors = [];
        $input = Input::all();

        $user = User::find(Input::get('userId'))->first();


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

        }catch( Exception $exception) {
            $messages = $exception->getErrors()->toArray();

            $errors = array_merge_recursive($messages, $errors);

            return Response::json($errors, 400);
        }

	}

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
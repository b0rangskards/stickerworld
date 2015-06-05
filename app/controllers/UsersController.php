<?php

use Acme\Activation\ResendUserActivationCommand;
use Acme\Users\DeactivateUserCommand;
use Acme\Users\ReactivateUserCommand;

class UsersController extends BaseController {

    /**
     * Check User if logged in
     *
     */
    function __construct()
    {
        $this->beforeFilter('auth');
    }

    /**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::where('id', '!=', Auth::user()->id)->with('role')->get();

		return View::make('users.index', compact('users'));
	}


    public function resendActivationEmail()
    {
        $array = Input::only('user_id');

        User::findOrFail($array['user_id']);

        $this->execute(ResendUserActivationCommand::class);
    }

    public function deactivateUser()
    {
        extract(Input::all());

        $user = User::findOrFail($userId);

        $this->execute(DeactivateUserCommand::class);

        return Response::json();
    }

    public function reactivateUser()
    {
        extract(Input::all());

        $user = User::findOrFail($userId);

        $this->execute(ReactivateUserCommand::class);

        return Response::json();
    }

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
//	public function create()
//	{
//		return View::make('users.create');
//	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
//	public function show($id)
//	{
//		$user = User::findOrFail($id);
//
//		return View::make('users.show', compact('user'));
//	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
//	public function edit($id)
//	{
//		$user = User::find($id);
//
//		return View::make('users.edit', compact('user'));
//	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
//	public function update($id)
//	{
//		$user = User::findOrFail($id);
//
//		$validator = Validator::make($data = Input::all(), User::$rules);
//
//		if ($validator->fails())
//		{
//			return Redirect::back()->withErrors($validator)->withInput();
//		}
//
//		$user->update($data);
//
//		return Redirect::route('users.index');
//	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
//	public function destroy($id)
//	{
//		User::destroy($id);
//
//		return Redirect::route('users.index');
//	}

}

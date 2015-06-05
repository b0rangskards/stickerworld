<?php

use Acme\Forms\SignInForm;
use Laracasts\Flash\Flash;

class SessionsController extends \BaseController {

    private $signInForm;

    /**
     * @param SignInForm $signInForm
     */
    function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;

        $this->beforeFilter('guest', ['except' => 'destroy']);
    }


    /**
     * Show the form for signing in.
     * @return \Illuminate\View\View
     */
    public function create()
	{
		return View::make('sessions.create');
	}

    /**
     * Sign the user in
     * @return mixed
     */
    public function store()
    {
        // fetch the form input
        $formData = Input::only('username', 'password');

        $this->signInForm->validate($formData);

        if ( ! Auth::attempt($formData))
        {
            Flash::error('Invalid Username/Password.');

            return Redirect::back()->withInput();
        }

        Auth::user()->updateLastLoginDate();

        Flash::message('Welcome back!');

        return Redirect::intended('/dashboard');
    }

    /**
     * Log a user out.
     * @return mixed
     */
    public function destroy()
    {
        Auth::logout();

        Flash::message('You have now been logged out.');

        return Redirect::to('/login');
    }

}
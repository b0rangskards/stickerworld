<?php

use Acme\Forms\SignInForm;
use Acme\Helpers\DataHelper;
use Laracasts\Flash\Flash;

class SessionsController extends \BaseController {

    private $signInForm;

    /**
     * @param SignInForm $signInForm
     */
    function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;
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
        try {
            $this->signInForm->validate(Input::only('username', 'password'));

            Session::put('currentUser', Auth::user());

            Auth::user()->updateLastLoginDate();

            Flash::message('Welcome back!');

            return Redirect::intended('/dashboard');

        } catch (Laracasts\Validation\FormValidationException $exception) {

            $errors = DataHelper::getErrorDataFromException($exception);

            Flash::error(DataHelper::arrayToString($errors));

            return Redirect::back()->withInput();
        }
    }

    /**
     * Log a user out.
     * @return mixed
     */
    public function destroy()
    {
        Auth::logout();

        Session::flush();

        Flash::message('You have now been logged out.');

        return Redirect::to('/login');
    }

}
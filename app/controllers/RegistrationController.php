<?php

use Acme\Forms\RegistrationForm;
use Acme\Registration\InvalidActivationCodeException;
use Acme\Registration\RegisterUserCommand;
use Laracasts\Flash\Flash;

class RegistrationController extends BaseController {

    private $registrationForm;

    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;

        $this->beforeFilter('auth', ['except' => 'activate']);
    }

    /**
	 * Show the form for creating a new resource.
	 * GET /registration/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = 'Register User';

        // Get Roles for form button group
        $roles = Role::orderBy('id')->get();

		return View::make('registration.create',
            ['roles' => $roles, 'pageTitle' => $pageTitle]
        );
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /registration
	 *
	 * @return Response
	 */
	public function store()
	{
        $this->registrationForm->validate(Input::all());

        $this->execute(RegisterUserCommand::class);

        Flash::success('User Successfully Registered. An Email was sent to User.');

        return Redirect::back();
    }


}
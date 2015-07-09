<?php

use Acme\AccessControl\Roles\RoleRepository;
use Acme\Forms\RegistrationForm;
use Acme\Helpers\ViewDataHelper;
use Acme\Registration\InvalidActivationCodeException;
use Acme\Registration\RegisterUserCommand;
use Laracasts\Flash\Flash;

class RegistrationController extends BaseController {

    protected $registrationForm;

    protected $roleRepository;

    function __construct(RegistrationForm $registrationForm, RoleRepository $roleRepository)
    {
        $this->registrationForm = $registrationForm;

        $this->roleRepository = $roleRepository;
    }

    /**
	 * Show the form for creating a new resource.
	 * GET /registration/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $currentPage = [
            'Users' => [
                'url' => URL::route('users_index_path')
            ],
            'Register User' => [
                'isCurrentPage' => true
            ]
        ];
        $viewData = ViewDataHelper::createViewHeaderData('Users', 'Registration', $currentPage, 'fa fa-user');

        $viewData = array_merge($viewData, [
           'employees' => Employee::nonUsers()->get(),
           'roles'     => $this->roleRepository->getRoles()
        ]);

		return View::make('registration.create', $viewData);
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

        Flash::success('User Successfully Registered. An Email was sent to User for activation.');

        return Redirect::back();
    }


}
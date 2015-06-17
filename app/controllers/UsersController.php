<?php

use Acme\Activation\ResendUserActivationCommand;
use Acme\Users\DeactivateUserCommand;
use Acme\Users\ReactivateUserCommand;
use Acme\Users\UserRepository;

class UsersController extends BaseController {

    private $userRepository;

    /**
     * Check User if logged in
     * @param UserRepository $userRepository
     */
    function __construct(UserRepository $userRepository)
    {
        $this->beforeFilter('auth');

        $this->userRepository = $userRepository;
    }

    /**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['users'] = $this->userRepository->getTableData();
        $data['columns'] = $this->userRepository->getTableColumns();

		return View::make('users.index', $data);
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

}

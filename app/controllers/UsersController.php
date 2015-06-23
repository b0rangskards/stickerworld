<?php

use Acme\Activation\ResendUserActivationCommand;
use Acme\Users\DeactivateUserCommand;
use Acme\Users\ReactivateUserCommand;
use Acme\Users\UserRepository;

class UsersController extends BaseController {

    private $userRepository;

    /**
     *
     * @param UserRepository $userRepository
     */
    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['headerTitle'] = 'Users';
        $data['subTitle'] = 'Management';
        $data['currentPage'] = 'Manage Users';

        $data['data'] = $this->userRepository->getTableData();
        $data['columns'] = $this->userRepository->getTableColumns();

		return View::make('users.index', $data);
	}


    public function resendActivationEmail()
    {
        $array = Input::only('user_id');

        User::where('id', $array['user_id']);

        $this->execute(ResendUserActivationCommand::class);
    }

    public function deactivateUser()
    {
        extract(Input::all());

        $user = User::find($userId);

        if(!$user) {
            return Response::json(['message' => 'Cannot find user.'], 400);
        }

        $this->execute(DeactivateUserCommand::class);

        return Response::json();
    }

    public function reactivateUser()
    {
        extract(Input::all());

        $user = User::where('id', $userId)->first();

        if ( !$user ) {
            return Response::json(['message' => 'Cannot find user.'], 400);
        }

        $this->execute(ReactivateUserCommand::class);

        return Response::json();
    }

}

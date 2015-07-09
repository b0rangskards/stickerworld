<?php

use Acme\Activation\ResendUserActivationCommand;
use Acme\Helpers\ViewDataHelper;
use Acme\Users\DeactivateUserCommand;
use Acme\Users\ReactivateUserCommand;
use Acme\Users\UserRepository;
use Chumper\Datatable\Datatable;

class UsersController extends BaseController {

    private $userRepository;

    private $dataTable;

    /**
     *
     * @param UserRepository $userRepository
     */
    function __construct(UserRepository $userRepository, Datatable $dataTable)
    {
        $this->userRepository = $userRepository;

        $this->dataTable = $dataTable;
    }

    /**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
        $viewData = ViewDataHelper::createViewHeaderData('Users', 'Management', 'Manage Users', 'fa fa-users');

        $viewData = array_merge($viewData, [
           'data'       => $this->userRepository->getTableData(),
           'columns'    => $this->userRepository->getTableColumns()
        ]);

		return View::make('users.index', $viewData);
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

//    public function getDatatable()
//    {
//        return $this->dataTable->collection($this->userRepository->getMembers())
//            ->showColumns('Username', 'Role', 'Last Login', 'Activated')
//            ->addColumn('Username', function ($model) {
//                return '<span class="weight600">' . $model->username . '</span>';
//            })
//            ->addColumn('Role', function($model) {
//                $class = "";
//                switch($model->role->id) {
//                    case 1:
//                        $class = 'bg-info';
//                        break;
//                    case 2:
//                        $class = 'bg-success';
//                        break;
//                    case 3:
//                        $class = 'bg-warning';
//                        break;
//                    case 4:
//                        $class = 'bg-primary';
//                        break;
//                    case 5:
//                        $class = 'bg-default';
//                }
//                return '<span class="badge '.$class.'">'.$model->role->present()->prettyRoleName.'</span>';
//            })
//            ->addColumn('Last Login', function ($model) {
//                return '<span class="text-muted">' . $model->present()->lastLoginHuman . '</span>';
//            })
//            ->addColumn('Activated', function ($model) {
//                return $model->recstat === 'A'
//                    ? '<span class="badge bg-success">Yes</span>'
//                    : '<span class="badge bg-danger">No</span>';
//            })
//            ->searchColumns('username')
//            ->orderColumns('username')
//            ->make();
//    }

}

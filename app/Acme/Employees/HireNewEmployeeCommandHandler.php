<?php  namespace Acme\Employees; 

use Acme\Helpers\FileHelper;
use Acme\Users\UserRepository;
use Config;
use Employee;
use Input;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use User;

class HireNewEmployeeCommandHandler implements CommandHandler {

    use DispatchableTrait;

    protected $repository;

    protected $userRepository;

    /**
     * @param EmployeeRepository $repository
     * @param UserRepository $userRepository
     */
    function __construct(EmployeeRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;

        $this->userRepository = $userRepository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $employee = Employee::hire($command);

        // upload file here and pass the file path to hire function
        if ( Input::hasFile('employee_photo') )
        {
            $file = Input::file('employee_photo');

            $fileName = FileHelper::createEmployeePictureFileName(Input::get('firstname'), Input::get('lastname'), $file);

            $file->move( Config::get('constants.EMPLOYEE_PICTURE_PATH'), $fileName);

            $employee->picture = $fileName;
        }

        $this->repository->save( $employee);

        // Create account if checked
        $createAccount = Input::get('create_account');

        if(!is_null($createAccount) && $createAccount === 'checked')
        {
            $user = User::register(Input::get('role'), Input::get('email'));

            $this->userRepository->save($user);

            $employee->createAccountForEmployee($user);

            $this->repository->save($employee);

            $this->dispatchEventsFor($user);
        }

    }
}
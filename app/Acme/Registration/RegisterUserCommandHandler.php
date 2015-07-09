<?php  namespace Acme\Registration; 

use Employee;
use Laracasts\Commander\CommandHandler;
use Acme\Users\UserRepository;
use Laracasts\Commander\Events\DispatchableTrait;
use User;

class RegisterUserCommandHandler implements CommandHandler  {

    use DispatchableTrait;

    /**
     * @var UserRepository
     */
    protected $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $employee = Employee::find($command->emp_id);

        $user = User::register(
            $command->role_id, $command->email
        );

        if(!$employee)
        {
            $this->repository->save($user);
        }
        else {
            $this->repository->saveWithEmployee($user, $employee);
        }

        $this->dispatchEventsFor( $user);

        return $user;
    }
}
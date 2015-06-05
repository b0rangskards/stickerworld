<?php  namespace Acme\Registration; 

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
        $user = User::register(
            $command->role_id, $command->email
        );

        $this->repository->save( $user);

        $this->dispatchEventsFor( $user);

        return $user;
    }
}
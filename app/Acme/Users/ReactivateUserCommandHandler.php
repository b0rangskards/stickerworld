<?php  namespace Acme\Users; 

use Laracasts\Commander\CommandHandler;
use User;

class ReactivateUserCommandHandler implements CommandHandler {

    protected $repository;

    /**
     * @param UserRepository $repository
     */
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
        $user = User::reactivate($command->userId);

        $this->repository->save( $user);

        return $user;
    }
}
<?php  namespace Acme\Users; 

use Laracasts\Commander\CommandHandler;
use User;

class DeactivateUserCommandHandler implements CommandHandler {

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
        $user = User::deactivate($command->userId);

        $this->repository->save($user);

        return $user;
    }
}
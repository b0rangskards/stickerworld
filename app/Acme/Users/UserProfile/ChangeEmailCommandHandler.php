<?php  namespace Acme\Users\UserProfile; 

use Acme\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use User;

class ChangeEmailCommandHandler implements CommandHandler {

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
        $user = User::where('id', $command->pk)->first();

        $user = User::changeEmail($user, $command->value);

        $this->repository->save($user);
    }
}
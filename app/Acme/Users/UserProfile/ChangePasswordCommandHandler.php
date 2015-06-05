<?php  namespace Acme\Users\UserProfile; 

use Acme\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use User;

class ChangePasswordCommandHandler implements CommandHandler {

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
        $user = User::whereUsername($command->username)->first();

        $user = User::changePassword($user, $command->new_password);

        $this->repository->save( $user );
    }
}
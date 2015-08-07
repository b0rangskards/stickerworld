<?php  namespace Acme\Activation; 

use Acme\Users\UserRepository;
use Auth;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Session;
use User;

class ActivateUserCommandHandler implements CommandHandler {

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

        $user = User::activate(
            $command->username, $command->password, $command->activation_code
        );

        $this->repository->save( $user);

        $this->dispatchEventsFor( $user);

        $user->updateLastLoginDate();

        if(Auth::check())
        {
            Auth::logout();

            Session::flush();
        }

        Auth::loginUsingId($user->id);

        return $user;
    }
}
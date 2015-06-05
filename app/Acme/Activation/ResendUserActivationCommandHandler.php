<?php  namespace Acme\Activation; 

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use User;

class ResendUserActivationCommandHandler implements CommandHandler{

    use DispatchableTrait;

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = User::resendActivationEmail($command->user_id);

        $this->dispatchEventsFor( $user);

        return $user;
    }
}
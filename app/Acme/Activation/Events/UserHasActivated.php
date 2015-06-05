<?php  namespace Acme\Activation\Events; 

use User;

class UserHasActivated {

    public $user;

    /**
     * @param User $user
     */
    function __construct(User $user)
    {
        $this->user = $user;
    }


} 
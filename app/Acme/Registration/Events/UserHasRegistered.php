<?php  namespace Acme\Registration\Events; 

use User;

class UserHasRegistered {

    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

}
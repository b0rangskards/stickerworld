<?php  namespace Acme\Users; 

class ReactivateUserCommand {

    public $userId;

    function __construct($userId)
    {
        $this->userId = $userId;
    }

} 
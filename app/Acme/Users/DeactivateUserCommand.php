<?php  namespace Acme\Users; 

class DeactivateUserCommand {

    public $userId;

    function __construct($userId)
    {
        $this->userId = $userId;
    }


}
<?php  namespace Acme\Activation; 

class ResendUserActivationCommand {

    public $user_id;

    /**
     * @param $user_id
     */
    function __construct($user_id)
    {
        $this->user_id = $user_id;
    }


} 
<?php  namespace Acme\Users\UserProfile; 

class ChangePasswordCommand {

    public $user_id;

    public $current_password;

    public $new_password;

    public $new_password_confirmation;

    function __construct($user_id, $current_password, $new_password, $new_password_confirmation)
    {
        $this->user_id = $user_id;
        $this->current_password = $current_password;
        $this->new_password = $new_password;
        $this->new_password_confirmation = $new_password_confirmation;
    }


} 
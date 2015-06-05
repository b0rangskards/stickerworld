<?php  namespace Acme\Users\UserProfile; 

class ChangePasswordCommand {

    public $username;

    public $current_password;

    public $new_password;

    public $new_password_confirmation;

    function __construct($username, $current_password, $new_password, $new_password_confirmation)
    {
        $this->username = $username;
        $this->current_password = $current_password;
        $this->new_password = $new_password;
        $this->new_password_confirmation = $new_password_confirmation;
    }


} 
<?php  namespace Acme\Registration; 

class RegisterUserCommand {

    public $role_id;

    public $username;

    public $password;

    public $email;

    public $activation_code;

    function __construct($role_id, $email)
    {
        $this->role_id = $role_id;
        $this->email = $email;
    }

} 
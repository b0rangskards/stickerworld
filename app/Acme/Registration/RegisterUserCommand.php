<?php  namespace Acme\Registration; 

class RegisterUserCommand {

    public $role_id;

    public $emp_id;

    public $username;

    public $password;

    public $email;

    public $activation_code;

    function __construct($role_id, $email, $emp_id)
    {
        $this->role_id = $role_id;

        $this->email = $email;

        $this->emp_id = $emp_id;
    }

} 
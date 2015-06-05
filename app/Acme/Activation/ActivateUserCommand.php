<?php namespace Acme\Activation;

class ActivateUserCommand {

    public $username;

    public $password;

    public $activation_code;

    /**
     * @param $username
     * @param $password
     * @param $activation_code
     */
    function __construct($username, $password, $activation_code)
    {
        $this->username = $username;

        $this->password = $password;

        $this->activation_code = $activation_code;
    }

} 
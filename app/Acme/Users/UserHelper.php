<?php  namespace Acme\Users; 

class UserHelper {

    public static function generateUsernameByEmail($email)
    {
        return explode('@', $email)[0] . time();
    }

    public static function generateUserActivationCode()
    {
        return str_random(20);
    }
} 
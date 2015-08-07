<?php

class ActivateUserPage
{
    // Email Content on User Activation
    public static $activationEmailContent = 'Please follow the link below to Activate your account';

    public static $URL = 'register/activate/';

    public static $header = 'Please enter desired Username and Password to activate your account';

    public static $usernameField = 'username';

    public static $passwordField = 'password';

    public static $confirmPasswordField = 'password_confirmation';

    public static $activateButton = 'Activate Account';

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: EditPage::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }


}
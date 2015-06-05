<?php

use Codeception\Module\FunctionalHelper;

class SignInPage extends \Codeception\Module
{
    // include url of current page
    public static $URL = '/login';

    public static $usernameField = 'username';

    public static $passwordField = 'password';

    public static $signInButton = 'Sign In';

    public static $invalidCredentialsMessage = 'Invalid Username/Password.';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

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
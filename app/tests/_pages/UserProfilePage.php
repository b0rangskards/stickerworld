<?php

class UserProfilePage
{
    // include url of current page
    public static $URL = '/profile';

    public static $basicDetailsTab = 'Basic Details';

    public static $changePasswordLink = 'Click here to change password';

    public static $changeUsernameLink = 'a#username';

    public static $changeEmailLink = 'a#email';


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

    public static function url($username)
    {
        return self::$URL . '/' . $username;
    }


}
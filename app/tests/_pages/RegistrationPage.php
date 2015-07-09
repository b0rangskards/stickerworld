<?php

class RegistrationPage
{
    public static $URL = '/register';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     *
     */
    public static $roleIdOption = 'form input[name=role_id]';
    public static $emailField = 'Email';

    public static $formSubmitButton = 'Register User';

    public static $tableName = 'users';

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
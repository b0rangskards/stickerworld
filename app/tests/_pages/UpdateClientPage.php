<?php

class UpdateClientPage
{
    // include url of current page
    public static $URL = 'client/edit/';

	public static $nameField = 'input[name=name]';

	public static $addressField = 'input[name=address]';

	public static $contactNoField = 'input[name=contact_no]';

	public static $submitButton = 'Update Client';

	public static $successMessage = 'Successfully Updated Client.';

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
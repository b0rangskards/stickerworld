<?php

class UpdateSupplierPage
{
    // include url of current page
    public static $URL = '/supplier/edit/';

    public static $formSubmitButton = 'Update Supplier';

    public static $successMessage = 'Successfully Updated Supplier Information.';
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
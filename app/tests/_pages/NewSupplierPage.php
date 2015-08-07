<?php

class NewSupplierPage
{
    // include url of current page
    public static $URL = '/supplier/new';

    public static $nameField = 'name';

    public static $supplierTypeOptionField = 'supplier_type';

    public static $addressField = 'address';

    public static $emailField = 'email';

    public static $contactNoField = 'contact_no[]';

    public static $contactTypeOptionField = 'contact_type[]';

    public static $formSubmitButton = 'Add Supplier';

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
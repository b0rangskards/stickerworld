<?php

class SuppliersPage
{
    // include url of current page
    public static $URL = '/supplier/suppliers';

    public static $tableName = 'suppliers';

    public static $newSupplierButton = 'a#new-supplier-btn';

    public static $tableRow = 'table#suppliers-table > tbody tr';

    public static $updateSupplierButton = 'a.update-supplier-btn';
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

    public static function row($id)
    {
        return 'tr[data-supplier-id=' . $id . '] ';
    }

    public static function updateLink($id)
    {
        return self::row($id) . self::$updateSupplierButton;
    }


}
<?php

class DepartmentsPage
{
    // include url of current page
    public static $URL = '/department/departments';

    public static $tableName = 'departments';

    public static $newDepartmentButton = 'a#new-department-btn';

    public static $tableRow = 'table.departments-table > tbody tr';
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
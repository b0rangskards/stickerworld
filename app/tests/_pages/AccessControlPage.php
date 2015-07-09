<?php

class AccessControlPage
{
    // include url of current page
    public static $URL = '/access_control';

    public static $newRoleButton = '#new-role-btn';

    public static $newPermissionButton = '#new-permission-btn';

    public static $tableElement = 'table#access-control-table';

    // Table Names
    public static $roleTableName = 'roles';

    public static $permissionTableName = 'permissions';

    public static $permissionGroupTableName = 'permission_groups';

    public static $permissionRoleTableName = 'permission_role';


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
<?php

class UpdateEmployeePage
{
    // include url of current page
    public static $URL = '/employee/edit/';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    public static $firstnameField = 'firstname';

    public static $lastnameField = 'lastname';

    public static $middlenameField = 'middlename';

    public static $genderOptionField = 'gender';

    public static $birthdateField = 'birthdate';

    public static $addressField = 'address';

    public static $contactNoField = 'contact_no';

    public static $deptIdField = 'dept_id';

    public static $designationField = 'designation';

    public static $branchOptionField = 'br_id';

    public static $createAccountCheckbox = 'create_account';

    public static $roleIdOptionField = 'role_id';

    public static $emailField = 'email';

    public static $photoFileUploadField = 'employee_photo';

    public static $formSubmitButton = 'Update Employee';

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
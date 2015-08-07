<?php

class LogisticsCostsPage
{
    // include url of current page
    public static $URL = '/project/logistics-cost/logistics-costs';

	public static $newLogisticsCostButton = 'New Logistics Cost';

	public static $updateLogisticsCostButton = '.update-logistics-cost-btn';

	public static $deleteLogisticsCostButton = '.delete-logistics-cost-btn';

	public static $tableName = 'utility_costs';

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
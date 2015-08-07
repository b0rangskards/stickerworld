<?php

class LaborCostsPage
{
    // include url of current page
    public static $URL = '/project/labor-cost/labor-costs';

	public static $newLaborCostButton = 'New Labor Cost';

	public static $updateLaborCostButton = '.update-labor-cost-btn';

	public static $deleteLaborCostButton = '.delete-labor-cost-btn';

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
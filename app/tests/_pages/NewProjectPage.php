<?php

class NewProjectPage
{
    // include url of current page
    public static $URL = '/project/new';

	public static $addMaterialLink = 'Add Materials';

	public static $addStandardMaterialLink = 'Add Standard Materials';

	public static $addLaborCostLink = 'Add Labor Cost';

	public static $addLogisticsLink = 'Add Logistics';


	public static $subTotalAmount = '#sub-total-amount';

	public static $contingenciesAmount = '#contingencies-amount';

	public static $totalCostAmount = '#total-cost-amount';

	public static $standardCostAmount = '#standard-cost-amount';

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
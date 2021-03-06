<?php

class UpdateLogisticsCostPage
{
    // include url of current page
	public static $URL = '/project/logistics-cost/edit/';

	public static $typeField = 'input[name=type]';

	public static $rateField = 'input[name=rate]';

	public static $remarksField = 'textarea[name=remarks]';

	public static $submitButton = 'Update Logistics Cost';

	public static $successMessage = 'Successfully Updated Logistics Cost.';

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
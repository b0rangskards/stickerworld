<?php

class UpdateItemPage
{
    // include url of current page
    public static $URL = '/item/edit/';

	public static $updateButton = 'Update Item';

	public static $successMessage = 'Successfully Updated Item.';

	public static $supplierSelect = 'select[name=supplier_id]';

	public static $nameField = 'input[name=name]';

	public static $typeSelect = 'select[name=type]';

	public static $unitOfMeasurSelect = 'select[name=unit_of_measure]';

	public static $unitPriceField = 'input[name=unit_price]';

	public static $detailsField = 'textarea[name=details]';

	public static $remarksField = 'textarea[name=remarks]';
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
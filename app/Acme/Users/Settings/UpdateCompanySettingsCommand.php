<?php  namespace Acme\Users\Settings; 

class UpdateCompanySettingsCommand {

	public $company_name;
	public $vat_rate;
	public $tin_no;

	function __construct($company_name, $tin_no, $vat_rate)
	{
		$this->company_name = $company_name;
		$this->tin_no = $tin_no;
		$this->vat_rate = $vat_rate;
	}

} 
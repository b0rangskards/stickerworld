<?php  namespace Acme\LaborCosts; 

class NewLaborCostCommand {

	public $type;

	public $rate;

	public $remarks;

	function __construct($type, $rate, $remarks)
	{
		$this->type = $type;
		$this->rate = $rate;
		$this->remarks = $remarks;
	}


} 
<?php  namespace Acme\LaborCosts; 

class UpdateLaborCostCommand {

	public $id;

	public $type;

	public $rate;

	public $remarks;

	function __construct($id, $type, $rate, $remarks)
	{
		$this->id = $id;
		$this->type = $type;
		$this->rate = $rate;
		$this->remarks = $remarks;
	}


} 
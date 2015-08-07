<?php  namespace Acme\LogisticsCosts; 

class NewLogisticsCostCommand {

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
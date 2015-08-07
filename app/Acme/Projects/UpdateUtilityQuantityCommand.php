<?php  namespace Acme\Projects; 

class UpdateUtilityQuantityCommand {

	public $id;

	public $noOfEmp;

	public $noOfDays;

	function __construct($id, $noOfEmp, $noOfDays)
	{
		$this->id = $id;
		$this->noOfEmp = $noOfEmp;
		$this->noOfDays = $noOfDays;
	}
} 
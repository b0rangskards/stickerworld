<?php  namespace Acme\Projects; 

class AddLaborCostFromProjectCommand {

	public $type;

	public $no_of_emp;

	public $no_of_days;

	function __construct($type, $no_of_emp, $no_of_days)
	{
		$this->type = $type;
		$this->no_of_emp = $no_of_emp;
		$this->no_of_days = $no_of_days;
	}


} 
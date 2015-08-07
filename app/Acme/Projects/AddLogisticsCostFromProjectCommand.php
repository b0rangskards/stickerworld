<?php  namespace Acme\Projects; 

class AddLogisticsCostFromProjectCommand {

	public $type;

	public $no_of_deliveries;

	function __construct($type, $no_of_deliveries)
	{
		$this->type = $type;
		$this->no_of_deliveries = $no_of_deliveries;
	}


} 
<?php  namespace Acme\Projects; 

class UpdateLogisticsQuantityCommand {

	public $id;

	public $qty;

	function __construct($id, $qty)
	{
		$this->id = $id;
		$this->qty = $qty;
	}


} 
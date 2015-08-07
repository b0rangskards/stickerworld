<?php  namespace Acme\Projects; 

class UpdateMaterialQuantityCommand {

	public $item_id;

	public $qty;

	function __construct($item_id, $qty)
	{
		$this->item_id = $item_id;
		$this->qty = $qty;
	}
} 
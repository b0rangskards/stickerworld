<?php  namespace Acme\Items; 

class NewItemCommand {

	public $supplier_id;

	public $name;

	public $type;

	public $unit_of_measure;

	public $unit_price;

	public $details;

	public $remarks;

	public $is_sm;

	function __construct($supplier_id, $name, $type, $unit_of_measure, $unit_price, $details, $remarks, $is_sm)
	{
		$this->supplier_id = $supplier_id;
		$this->name = $name;
		$this->type = $type;
		$this->unit_of_measure = $unit_of_measure;
		$this->unit_price = $unit_price;
		$this->details = $details;
		$this->remarks = $remarks;
		$this->is_sm = $is_sm;
	}
} 
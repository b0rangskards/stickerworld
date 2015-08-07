<?php  namespace Acme\Items; 

class UpdateItemCommand {

	public $id;

	public $name;

	public $type;

	public $unit_of_measure;

	public $unit_price;

	public $details;

	public $remarks;

	function __construct($id, $name, $type, $unit_of_measure, $unit_price, $remarks, $details)
	{
		$this->id = $id;
		$this->name = $name;
		$this->type = $type;
		$this->unit_of_measure = $unit_of_measure;
		$this->unit_price = $unit_price;
		$this->remarks = $remarks;
		$this->details = $details;
	}


} 
<?php  namespace Acme\Projects; 

class StoreNewProjectToSessionCommand {

	public $pk;
	public $name;
	public $value;

	function __construct($pk, $name, $value)
	{
		$this->pk = $pk;
		$this->name = $name;
		$this->value = $value;
	}

} 
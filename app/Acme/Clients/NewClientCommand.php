<?php  namespace Acme\Clients; 

class NewClientCommand {

	public $br_id;
	public $name;
	public $address;
	public $contact_no;

	function __construct($br_id, $name, $address, $contact_no)
	{
		$this->br_id = $br_id;
		$this->name = $name;
		$this->address = $address;
		$this->contact_no = $contact_no;
	}

} 
<?php  namespace Acme\Clients; 

class UpdateClientCommand {

	public $id;
	public $name;
	public $address;
	public $contact_no;

	function __construct($id, $name, $contact_no, $address)
	{
		$this->id = $id;
		$this->name = $name;
		$this->contact_no = $contact_no;
		$this->address = $address;
	}


} 
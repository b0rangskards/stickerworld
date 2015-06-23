<?php  namespace Acme\Branches; 

class AddNewBranchCommand {

    public $name;

    public $address;

    public $contact_no;

    public $lat;

    public $lng;

    function __construct($name, $address, $contact_no, $lat, $lng)
    {
        $this->name = $name;
        $this->address = $address;
        $this->contact_no = $contact_no;
        $this->lat = $lat;
        $this->lng = $lng;
    }

} 
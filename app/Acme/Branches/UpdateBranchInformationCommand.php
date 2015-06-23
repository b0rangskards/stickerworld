<?php  namespace Acme\Branches; 

class UpdateBranchInformationCommand {

    public $id;

    public $name;

    public $address;

    public $contact_no;

    public $lat;

    public $lng;

    function __construct($id, $name, $address, $contact_no, $lat, $lng)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->contact_no = $contact_no;
        $this->lat = $lat;
        $this->lng = $lng;
    }

}
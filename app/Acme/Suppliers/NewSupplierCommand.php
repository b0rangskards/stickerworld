<?php  namespace Acme\Suppliers; 

class NewSupplierCommand {

    public $name;

    public $supplier_type;

    public $address;

    public $email;

    public $contact_no;

    public $contact_type;

    function __construct($name, $supplier_type, $address, $email, $contact_no, $contact_type)
    {
        $this->name = $name;
        $this->supplier_type = $supplier_type;
        $this->address = $address;
        $this->email = $email;
        $this->contact_no = $contact_no;
        $this->contact_type = $contact_type;
    }


} 
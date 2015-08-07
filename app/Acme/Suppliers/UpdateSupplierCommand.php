<?php  namespace Acme\Suppliers; 

class UpdateSupplierCommand {

    public $supplier_id;

    public $name;

    public $supplier_type;

    public $address;

    public $email;

    function __construct($supplier_id, $name, $supplier_type, $address, $email)
    {
        $this->supplier_id = $supplier_id;
        $this->name = $name;
        $this->supplier_type = $supplier_type;
        $this->address = $address;
        $this->email = $email;
    }


} 
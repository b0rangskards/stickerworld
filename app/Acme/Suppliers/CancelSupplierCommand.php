<?php  namespace Acme\Suppliers; 

class CancelSupplierCommand {

    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }

} 
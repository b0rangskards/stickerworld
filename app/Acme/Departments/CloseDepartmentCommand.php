<?php  namespace Acme\Departments; 

class CloseDepartmentCommand {

    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }


} 
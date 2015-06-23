<?php  namespace Acme\Departments; 

class NewDepartmentCommand {

    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }


} 
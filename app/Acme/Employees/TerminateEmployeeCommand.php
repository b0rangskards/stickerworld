<?php  namespace Acme\Employees; 

class TerminateEmployeeCommand {

    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }

} 
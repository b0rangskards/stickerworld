<?php  namespace Acme\Departments; 

class UpdateDepartmentCommand {

    public $id;

    public $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }


}

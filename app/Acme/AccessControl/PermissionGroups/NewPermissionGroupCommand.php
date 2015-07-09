<?php  namespace Acme\AccessControl\PermissionGroups; 

class NewPermissionGroupCommand {

    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }


} 
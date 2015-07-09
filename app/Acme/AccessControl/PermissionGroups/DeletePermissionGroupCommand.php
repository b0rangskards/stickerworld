<?php  namespace Acme\AccessControl\PermissionGroups; 

class DeletePermissionGroupCommand {

    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }


} 
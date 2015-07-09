<?php  namespace Acme\AccessControl\Permissions; 

class DeletePermissionCommand {

    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }


} 
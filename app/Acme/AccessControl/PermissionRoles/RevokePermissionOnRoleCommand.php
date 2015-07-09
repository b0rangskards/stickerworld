<?php  namespace Acme\AccessControl\PermissionRoles; 

class RevokePermissionOnRoleCommand {

    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }


} 
<?php  namespace Acme\AccessControl\PermissionRoles; 

class GrantRoleAPermissionCommand {

    public $permission_id;

    public $role_id;

    function __construct($permission_id, $role_id)
    {
        $this->permission_id = $permission_id;
        $this->role_id = $role_id;
    }


} 
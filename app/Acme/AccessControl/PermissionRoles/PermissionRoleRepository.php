<?php  namespace Acme\AccessControl\PermissionRoles; 

use Acme\Base\BaseRepositoryInterface;
use PermissionRole;
use Role;

class PermissionRoleRepository implements BaseRepositoryInterface {

    public function grant($role_id, $permission_id)
    {
        $role = Role::find($role_id);

        $role->permissions()->attach($permission_id);

        return PermissionRole::getId($role->id, $permission_id);
    }

    public function revoke(PermissionRole $permissionRole)
    {
        $permissionRole->delete();
    }

    public function getTableData()
    {
        // TODO: Implement getTableData() method.
    }

    public function getTableColumns()
    {
        // TODO: Implement getTableColumns() method.
    }
}
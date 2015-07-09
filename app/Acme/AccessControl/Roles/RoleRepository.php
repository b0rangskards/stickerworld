<?php  namespace Acme\AccessControl\Roles; 

use Acme\Base\BaseRepositoryInterface;
use Cache;
use Role;

class RoleRepository implements BaseRepositoryInterface {

    /**
     * @param Role $role
     * @return mixed
     */
    public function save(Role $role)
    {
        return $role->save();
    }

    public function getRoles()
    {
        $key = 'roles';

        if(Cache::has($key)) return Cache::get($key);

        $roles = Role::orderBy('id')->get();

        Cache::put($key, $roles, 1440);

        return $roles;
    }

    public function getRolesExcept($roleId)
    {
        $rolesResult = $this->getRoles();

        return $rolesResult->except($roleId);
    }

    /**
     * Delete a role
     * @param Role $role
     * @return mixed
     */
    public function deleteRole(Role $role)
    {
        return $role->delete();
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
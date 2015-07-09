<?php namespace Acme\AccessControl;

use Acme\AccessControl\PermissionGroups\PermissionGroupRepository;
use Acme\AccessControl\Roles\RoleRepository;
use Acme\Base\BaseRepositoryInterface;
use Permission;
use PermissionGroup;
use Role;

class AccessControlRepository implements BaseRepositoryInterface {

    protected $permissionGroupRepository;

    protected $roleRepository;

    function __construct(PermissionGroupRepository $permissionGroupRepository, RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;

        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function getTableData()
    {
        $permissionGroups = $this->permissionGroupRepository->getPermissionGroupWithPermissions();

        return $permissionGroups;
    }

    public function getTableColumns()
    {
        $adminId = 1;
        $roles = $this->roleRepository->getRolesExcept($adminId);

        $column[] = ['column' => 'Permission', 'width' => 3];

        foreach($roles as $role)
        {
            $column[] = [
                'column' => $role->present()->prettyRoleName,
                'role_desc' => $role->present()->prettyDescription,
                'id' => $role->id, 'width' => 1];
        }
        return $column;
    }

    public function search($q)
    {
        return PermissionGroup::
            select('id', 'name')
            ->with(['permissions' => function($query) use ($q) {
                $query->search($q);
            }])
            ->orderBy('id')
            ->get();
//        return PermissionGroup::search($query)
//            ->select('id', 'name')
//            ->with('permissions')
//            ->orderBy('id')
//            ->get();
    }
}
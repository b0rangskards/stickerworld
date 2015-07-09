<?php  namespace Acme\AccessControl\PermissionGroups; 

use Acme\Base\BaseRepositoryInterface;
use Cache;
use PermissionGroup;

class PermissionGroupRepository implements BaseRepositoryInterface {

    public function save(PermissionGroup $permissionGroup)
    {
        return $permissionGroup->save();
    }

    public function deleteGroup(PermissionGroup $permissionGroup)
    {
        return $permissionGroup->delete();
    }

    public static function getPermissionGroupWithPermissions()
    {
        $key = 'permissionGroupWithPermissions';

        if( Cache::has($key)) return Cache::get($key);

        $permissionGroups = PermissionGroup::select('id', 'name')
            ->with('permissions')
            ->orderBy('id')
            ->get();

        Cache::put($key, $permissionGroups, 60);

        return $permissionGroups;
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
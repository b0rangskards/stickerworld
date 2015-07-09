<?php

class PermissionRole extends \Eloquent {

    public $table = 'permission_role';

	protected $fillable = ['role_id', 'permission_id', 'recstat'];


    /**
     * Get PermissionsRole by role id
     * with permission
     * Applied Caching by 6 hours
     * key is permissionRole.role_id
     *
     * @param $roleId
     * @return \Illuminate\Database\Eloquent\Collection|mixed|static[]
     */
    public static function getPermissionByRole($roleId)
    {
        $key = 'permissionRole' . $roleId;

        if(Cache::has($key)) return Cache::get($key);

        $permissions = static::select('id','permission_id','role_id')
            ->where('role_id', $roleId)
            ->with(['permission' => function($query)
            {
                $query->select('id','group_id','name','route');
            }])
            ->get()
            ->toArray();

        Cache::put($key, $permissions, 360);

        return $permissions;
    }

    public static function getPermissionGroupsByRole($roleId)
    {
        $key = 'permissionRoleGroup' . $roleId;

        if ( Cache::has($key) ) return Cache::get($key);

        $permissionGroups = $result = DB::table('permission_role')
                            ->select('permission_groups.name AS name')
                            ->distinct()
                            ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                            ->join('permission_groups', 'permission_groups.id', '=', 'permissions.group_id')
                            ->where('permission_role.role_id', $roleId)
                            ->lists('name');

        Cache::put($key, $permissionGroups, 360);

        return $permissionGroups;
    }

    public static function isPermissionExists($roleId, $permissionId)
    {
        $permissionRole = static::where('role_id', $roleId)
            ->where('permission_id', $permissionId)
            ->first();

        return is_null($permissionRole) ? false : $permissionRole->id;
    }

    public static function getPermissionsByRoleAndPermissionGroup($roleId, $permissionGroupId)
    {
        $ids = [];

        //find all permissions first by permission group id
        $permissionRoles = static::leftJoin('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->where('permission_role.role_id', $roleId)
            ->where('permissions.group_id', $permissionGroupId)
            ->select('permission_role.id')
            ->get();

        if($permissionRoles->isEmpty()) return false;

        foreach($permissionRoles as $pr)
        {
            $ids[] = $pr->id;
        }

        return $ids;
    }

    public static function getId($roleId, $permissionId)
    {
        $permissionRole = static::where('role_id', $roleId)
            ->where('permission_id', $permissionId)
            ->first();

        if ( !is_null($permissionRole) ) {
            return $permissionRole->id;
        }
        return false;
    }

    public static function revoke($id)
    {
        return PermissionRole::find($id);
    }

    public function role()
    {
        return $this->belongsTo('Role');
    }

    public function permission()
    {
        return $this->belongsTo('Permission');
    }
}
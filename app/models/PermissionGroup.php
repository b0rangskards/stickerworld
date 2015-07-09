<?php

use Laracasts\Presenter\PresentableTrait;

class PermissionGroup extends \Eloquent {

    use PresentableTrait;

    protected $fillable = ['name'];

    public $timestamps = false;

    /**
     * Path to the presenter for permission.
     *
     * @var string
     */
    protected $presenter = 'Acme\Presenters\PermissionGroupPresenter';

    public static function newGroup($name)
    {
        return new static(compact('name'));
    }

    public static function deleteGroup($id)
    {
        return static::find($id);
    }

    public static function updateGroup($id, $name)
    {
        $permissionGroup = static::find($id);

        $permissionGroup->name = $name;

        return $permissionGroup;
    }

    public static function isPermissionRelatedSelectedAll($role_id, $permission_groups_id)
    {
        //get all the permission with group_id of param
        $permissions = Permission::where('group_id', $permission_groups_id)->get();

        //get all the permission_role with role_id and group id
        $permissionRoles = PermissionRole::getPermissionsByRoleAndPermissionGroup($role_id, $permission_groups_id);

        if(!$permissionRoles) return false;

        return count($permissionRoles) === $permissions->count();
    }

//    public static function getTableDataWithPermissions()
//    {
//        return static::select('id', 'name')
//            ->with('permissions')
//            ->orderBy('id')
//            ->get();
//    }

    public function permissions()
    {
        return $this->hasMany('Permission', 'group_id', 'id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', "%$search%");
    }

}
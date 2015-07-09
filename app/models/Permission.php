<?php

use Laracasts\Presenter\PresentableTrait;

class Permission extends \Eloquent {

    use PresentableTrait;

    protected $fillable = ['group_id', 'name', 'route', 'description'];

    /**
     * Path to the presenter for permission.
     *
     * @var string
     */
    protected $presenter = 'Acme\Presenters\PermissionPresenter';

    /**
     * @param $group_id
     * @param $name
     * @param $route
     * @param $description
     * @return static
     */
    public static function newPermission($group_id, $name, $route, $description)
    {
        return new static(compact('group_id', 'name', 'route', 'description'));
    }

    /**
     * @param $id
     * @param $group_id
     * @param $name
     * @param $route
     * @param $description
     * @return \Illuminate\Support\Collection|null|static
     */
    public static function updatePermission($id, $group_id, $name, $route, $description)
    {
        $permission = static::find($id);

        if( $permission->group_id != $group_id ) {
            $permission->group_id = $group_id;
        }

        if ( $permission->name != $name ) {
            $permission->name = strtolower($name);
        }

        if ( $permission->route != $route ) {
            $permission->route = strtolower($route);
        }

        $permission->description = strtolower($description);

        return $permission;
    }

    public static function deletePermission($id)
    {
        return static::find($id);
    }

    public function roles()
    {
        return $this->belongsToMany('Role');
    }

    public function permissionGroup()
    {
        return $this->belongsTo('PermissionGroup', 'group_id');
    }

    public function permission_roles()
    {
        return $this->hasMany('PermissionRole');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', "%$search%");
    }
}
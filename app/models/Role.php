<?php

use Laracasts\Presenter\PresentableTrait;

class Role extends \Eloquent {

    use PresentableTrait;

    /**
     * Path to the presenter for a role.
     *
     * @var string
     */
    protected $presenter = 'Acme\Presenters\RolePresenter';

	protected $fillable = ['id', 'name', 'description'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';
    /**
     * The disable timestamps.
     *
     * @var string
     */
    public $timestamps = false;


    public static function newRole( $name, $description )
    {
        return new static(compact('name', 'description'));
    }

    public static function deleteRole($id)
    {
        return static::find($id);
    }

    public static function changeName(Role $role, $name)
    {
        $role->name = strtolower($name);

        return $role;
    }

    public static function getDataForSelect($exceptRoles = [])
    {
        if(empty($exceptRoles)) {
            return static::select(['id', 'name'])
                ->orderBy('id')
                ->get();
        }

        return static::select(['id', 'name'])
                        ->whereNotIn('name', $exceptRoles)
                        ->orderBy('id')
                        ->get();
    }

    public function permissions()
    {
        return $this->belongsToMany('Permission');
    }


}
<?php


use Laracasts\Presenter\PresentableTrait;

class Department extends \Eloquent {

    use PresentableTrait;




	protected $fillable = ['name'];

    /**
     * Path to the presenter for a branch.
     *
     * @var string
     */
    protected $presenter = 'Acme\Presenters\DepartmentPresenter';


    public static function newDepartment($name)
    {
        $name = ucfirst($name);

        return new static(compact('name'));
    }

    public static function updateDepartment($id, $name)
    {
        $department = static::find($id);

        $department->name = $name;

        return $department;
    }

    public static function close($id)
    {
        return static::find($id);
    }

    public static function getDataForSelect()
    {
        return static::select(['name', 'id'])
                      ->orderBy('id')
                      ->get();
    }

//    public function employees()
//    {
//        return $this->hasMany('Employee');
//    }
}
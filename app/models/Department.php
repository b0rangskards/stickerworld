<?php


class Department extends \Eloquent {

	protected $fillable = ['name'];


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

    public function employees()
    {
        return $this->hasMany('Employee', 'dept_id');
    }
}
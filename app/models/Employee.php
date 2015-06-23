<?php

use Laracasts\Presenter\PresentableTrait;

class Employee extends \Eloquent {

    use PresentableTrait;

    /**
     * Path to the presenter for an employee.
     *
     * @var string
     */
    protected $presenter = 'Acme\Presenters\EmployeePresenter';

    protected $fillable = ['user_id', 'br_id', 'dept_id',
        'firstname', 'middlename', 'lastname', 'designation',
        'address', 'contact_no', 'recstat'];

    public function department()
    {
        return $this->belongsTo('Department', 'dept_id');
    }

}
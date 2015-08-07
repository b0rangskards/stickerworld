<?php

use Acme\Helpers\InputConverter;
use Carbon\Carbon;
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
        'firstname', 'middlename', 'lastname', 'address',
        'picture', 'contact_no', 'designation', 'recstat'];

    public static function hire($command)
    {
        $employee = new static();

        $employee->br_id = $command->branch;
        $employee->dept_id = $command->department;
        $employee->firstname = $command->firstname;
        $employee->middlename = $command->middlename;
        $employee->lastname = $command->lastname;
        $employee->birthdate = InputConverter::getDateFromDatePicker($command->birthdate);
        $employee->gender = $command->gender;
        $employee->address = $command->address;
        $employee->contact_no = $command->contact_no;
        $employee->designation = $command->designation;
        $employee->hired_date = InputConverter::getDateFromDatePicker($command->hired_date);

        return $employee;
    }

    public static function updateInformation($command)
    {
        $employee = static::find($command->employee_id);

        $employee->br_id = $command->branch;
        $employee->dept_id = $command->department;
        $employee->firstname = $command->firstname;
        $employee->middlename = $command->middlename;
        $employee->lastname = $command->lastname;
        $employee->birthdate = InputConverter::getDateFromDatePicker($command->birthdate);
        $employee->gender = $command->gender;
        $employee->address = $command->address;
        $employee->contact_no = $command->contact_no;
        $employee->designation = $command->designation;
        $employee->hired_date = InputConverter::getDateFromDatePicker($command->hired_date);

        return $employee;
    }

    public static function terminate($id)
    {
        $employee = static::find($id);

        $employee->terminated_date = Carbon::now();

        $employee->recstat = 'I';

        return $employee;
    }

    public function createAccountForEmployee(User $user)
    {
        $this->user_id = $user->id;
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function department()
    {
        return $this->belongsTo('Department', 'dept_id');
    }

    public function branch()
    {
        return $this->belongsTo('Branch', 'br_id');
    }

    /* Mutators */

    /**
     * Convert to lowercase
     *
     * @param $firstname
     */
    public function setFirstnameAttribute($firstname)
    {
        $this->attributes['firstname'] = strtolower($firstname);
    }

    /**
     * Convert to lowercase
     *
     * @param $middlename
     */
    public function setMiddlenameAttribute($middlename)
    {
        $this->attributes['middlename'] = strtolower($middlename);
    }

    /**
     * Convert to lowercase
     *
     * @param $lastname
     */
    public function setLastnameAttribute($lastname)
    {
        $this->attributes['lastname'] = strtolower($lastname);
    }

    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = $value ? $value: null;
    }

    public function scopeActive($query)
    {
        return $query->whereNull('terminated_date')
            ->whereRecstat('A');
    }

    public function scopeNonUsers($query)
    {
        return $query->whereNull('user_id');
    }
}
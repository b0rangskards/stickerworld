<?php  namespace Acme\Employees; 

class UpdateEmployeeCommand {

    public $employee_id;

    public $department;

    public $branch;

    public $firstname;

    public $middlename;

    public $lastname;

    public $birthdate;

    public $gender;

    public $address;

    public $contact_no;

    public $designation;

    public $hired_date;

    function __construct($employee_id, $firstname, $middlename, $lastname, $gender, $birthdate, $address, $contact_no, $branch, $department, $designation, $hired_date)
    {
        $this->employee_id = $employee_id;
        $this->firstname = $firstname;
        $this->middlename = $middlename;
        $this->lastname = $lastname;
        $this->gender = $gender;
        $this->birthdate = $birthdate;
        $this->address = $address;
        $this->contact_no = $contact_no;
        $this->branch = $branch;
        $this->department = $department;
        $this->designation = $designation;
        $this->hired_date = $hired_date;
    }


} 
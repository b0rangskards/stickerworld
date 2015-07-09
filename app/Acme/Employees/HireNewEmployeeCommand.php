<?php  namespace Acme\Employees; 

class HireNewEmployeeCommand {

    public $dept_id;

    public $br_id;

    public $firstname;

    public $middlename;

    public $lastname;

    public $birthdate;

    public $gender;

    public $address;

    public $contact_no;

    public $designation;

    public $hired_date;

    function __construct($dept_id, $br_id, $firstname, $middlename, $lastname,
                         $birthdate, $gender, $address, $contact_no, $designation,
                         $hired_date)
    {
        $this->dept_id = $dept_id;

        $this->br_id = $br_id;

        $this->firstname = $firstname;

        $this->middlename = $middlename;

        $this->lastname = $lastname;

        $this->birthdate = $birthdate;

        $this->gender = $gender;

        $this->address = $address;

        $this->contact_no = $contact_no;

        $this->designation = $designation;

        $this->hired_date = $hired_date;
    }

} 
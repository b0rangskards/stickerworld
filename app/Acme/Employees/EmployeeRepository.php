<?php  namespace Acme\Employees; 

use Acme\Base\BaseRepositoryInterface;
use Employee;

class EmployeeRepository implements BaseRepositoryInterface {

    public function getTableData()
    {
        return Employee::with('department')->get();
    }

    public function getTableColumns()
    {
        return [
            ['column' => 'Employee',    'width'  => '3'],
            ['column' => 'Department',  'width'  => '1'],
            ['column' => 'Designation', 'width'  => '1'],
            ['column' => 'Action',      'width'  => '1']
        ];
    }
}
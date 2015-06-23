<?php  namespace Acme\Departments; 

use Acme\Base\BaseRepositoryInterface;
use Department;

class DepartmentRepository implements BaseRepositoryInterface {

    public function save(Department $department)
    {
        $department->save();
    }

    public function close(Department $department)
    {
        return $department->delete();
    }

    public function getTableData()
    {
        return Department::all();
    }

    public function getTableColumns()
    {
        return [
            ['column' => 'Department', 'width' => '3'],
            ['column' => 'Action', 'width' => '1']
        ];
    }
}
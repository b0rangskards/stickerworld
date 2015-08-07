<?php  namespace Acme\Employees; 

use Acme\Base\BaseRepositoryInterface;
use DB;
use Employee;
use Session;
use User;

class EmployeeRepository implements BaseRepositoryInterface {

    /**
     * Persist an employee
     *
     * @param Employee $employee
     * @return bool
     */
    public function save(Employee $employee)
    {
        return $employee->save();
    }

    public function getEmployees($br_id = null)
    {
        return Employee::active()
            ->whereNested(function($q) use($br_id){
                if ( !is_null($br_id) ) {
                    $q->where('br_id', $br_id);
                }
            })
            ->with('department', 'branch')
            ->orderBy('br_id')
            ->orderBy('dept_id')
            ->orderBy('designation')
            ->orderBy('id')
            ->get();
    }

    public function getTableData()
    {
        $currentUser = Session::get('currentUser');

        if ( !is_null($currentUser->employee)) return $this->getEmployees($currentUser->employee->br_id);

        return $this->getEmployees();
    }

    public function getTableColumns()
    {
        return [
            ['column' => 'Employee',    'width'  => '2'],
            ['column' => 'Branch',      'width'  => '1'],
            ['column' => 'Department',  'width'  => '1'],
            ['column' => 'Designation', 'width'  => '1'],
            ['column' => 'Action',      'width'  => '1']
        ];
    }

	public function getEmployeeData($query, $designation, User $user)
	{
		return !isset($user->employee->br_id)
			? Employee::
				where('designation', $designation)
				->where('firstname', 'like', "%$query%")
				->get(['id', DB::raw('CONCAT(firstname, " ", lastname) AS fullname')])
			: Employee::
				where('designation', $designation)
				->where('firstname', 'like', "%$query%")
				->where('br_id', $user->employee->br_id)
				->get(['id', DB::raw('CONCAT(firstname, " ", lastname) AS fullname')]);

	}
}
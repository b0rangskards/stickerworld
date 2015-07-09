<?php  namespace Acme\Users;

use Acme\Base\BaseRepositoryInterface;
use Employee;
use Session;
use User;

class UserRepository implements BaseRepositoryInterface {

    /**
     * Persist a user
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }

    public function saveWithEmployee(User $user, Employee $employee)
    {
        $user->save();

        $employee->user_id = $user->id;

        $employee->save();

        return $user;
    }

    public function getMembers($br_id = null)
    {
        return User::members()
            ->whereHas('employee', function($q) use($br_id) {
                if(!is_null($br_id)) {
                    $q->where('br_id', $br_id);
                }
              })
            ->with(
                ['role',
                 'employee' => function($query) use($br_id) {
                    $query->with(['branch' => function($query){
                        $query->orderBy('name');
                    },
                    'department' => function($query){
                        $query->orderBy('name');
                    }
                 ]);
                }]
            )
            ->orderBy('activation_code')
            ->orderBy('last_login', 'DESC')
            ->orderBy('role_id')
            ->get();
    }

    public function getTableData()
    {
        $currentUser = Session::get('currentUser');

        if(!is_null($currentUser->employee)) return $this->getMembers($currentUser->employee->br_id);

        return $this->getMembers();
    }

    public function getTableColumns()
    {
        return [
          ['column' => 'Username', 'width' => '1'],
          ['column' => 'Department / Branch / Role', 'width' => '2'],
          ['column' => 'Last Login', 'width' => '1'],
          ['column' => 'Activated', 'width' => '1'],
          ['column' => 'Action', 'width' => '1']
        ];
    }



}
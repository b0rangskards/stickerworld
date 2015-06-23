<?php  namespace Acme\Users;

use Acme\Base\BaseRepositoryInterface;
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

    public function getTableData()
    {
        return User::members()->with('role')->get();
    }

    public function getTableColumns()
    {
        return [
          ['column' => 'Username', 'width' => '2'],
          ['column' => 'Role', 'width' => '1'],
          ['column' => 'Last Login', 'width' => '1'],
          ['column' => 'Activated', 'width' => '1'],
          ['column' => 'Action', 'width' => '1']
        ];
    }



}
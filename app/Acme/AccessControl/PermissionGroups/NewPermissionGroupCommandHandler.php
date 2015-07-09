<?php  namespace Acme\AccessControl\PermissionGroups; 

use Laracasts\Commander\CommandHandler;
use PermissionGroup;

class NewPermissionGroupCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(PermissionGroupRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $permissionGroup = PermissionGroup::newGroup(
            $command->name
        );

        return $this->repository->save($permissionGroup);
    }
}
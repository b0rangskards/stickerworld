<?php  namespace Acme\AccessControl\PermissionGroups; 

use Laracasts\Commander\CommandHandler;
use PermissionGroup;

class DeletePermissionGroupCommandHandler implements CommandHandler {

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
        $permissionGroup = PermissionGroup::deleteGroup(
            $command->id
        );

        return $this->repository->deleteGroup($permissionGroup);
    }
}
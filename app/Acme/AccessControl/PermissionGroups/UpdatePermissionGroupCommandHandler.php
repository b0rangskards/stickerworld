<?php  namespace Acme\AccessControl\PermissionGroups; 

use Laracasts\Commander\CommandHandler;
use PermissionGroup;

class UpdatePermissionGroupCommandHandler implements CommandHandler {

    protected $repository;

    /**
     * @param PermissionGroupRepository $repository
     */
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
        $permissionGroup = PermissionGroup::updateGroup(
            $command->pk,
            $command->value
        );

        return $this->repository->save($permissionGroup);
    }
}
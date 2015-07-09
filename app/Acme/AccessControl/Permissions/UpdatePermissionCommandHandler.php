<?php  namespace Acme\AccessControl\Permissions; 

use Laracasts\Commander\CommandHandler;
use Permission;

class UpdatePermissionCommandHandler implements CommandHandler {

    protected $repository;

    /**
     * @param PermissionRepository $repository
     */
    function __construct(PermissionRepository $repository)
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
        $permission = Permission::updatePermission(
          $command->id,
          $command->group_id,
          $command->name,
          $command->route,
          $command->description
        );

        $this->repository->save($permission);

        return $permission;
    }
}
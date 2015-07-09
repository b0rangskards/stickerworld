<?php  namespace Acme\AccessControl\Permissions; 

use Laracasts\Commander\CommandHandler;
use Permission;

class NewPermissionCommandHandler implements CommandHandler {

    protected $repository;

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
        $permission = Permission::newPermission(
          $command->group_id,
          $command->name,
          $command->route,
          $command->description
        );

        return $this->repository->save($permission);
    }
}
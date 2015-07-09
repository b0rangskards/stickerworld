<?php  namespace Acme\AccessControl\Permissions; 

use Laracasts\Commander\CommandHandler;
use Permission;

class DeletePermissionCommandHandler implements CommandHandler {

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
        $permission = Permission::deletePermission(
            $command->id
        );

        return $this->repository->deletePermission($permission);
    }
}
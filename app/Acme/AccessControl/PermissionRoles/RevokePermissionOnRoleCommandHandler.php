<?php  namespace Acme\AccessControl\PermissionRoles; 

use Laracasts\Commander\CommandHandler;
use PermissionRole;

class RevokePermissionOnRoleCommandHandler implements CommandHandler {

    protected $repository;

    /**
     * @param PermissionRoleRepository $repository
     */
    function __construct(PermissionRoleRepository $repository)
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
        $permissionRole = PermissionRole::revoke($command->id);

        return $this->repository->revoke(
            $permissionRole
        );
    }
}
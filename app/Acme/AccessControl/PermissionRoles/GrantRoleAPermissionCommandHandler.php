<?php  namespace Acme\AccessControl\PermissionRoles; 

use Laracasts\Commander\CommandHandler;

class GrantRoleAPermissionCommandHandler implements CommandHandler {

    protected $repository;

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
        return $this->repository->grant(
            $command->role_id,
            $command->permission_id
        );
    }
}
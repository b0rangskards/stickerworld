<?php  namespace Acme\AccessControl\Roles; 

use Laracasts\Commander\CommandHandler;
use Role;

class NewRoleCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(RoleRepository $repository)
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
        // convert to lowercase to uniform all data
        $name = strtolower($command->name);

        $description = strtolower($command->description);

        $role = Role::newRole( $name, $description );

        return $this->repository->save($role);
    }
}